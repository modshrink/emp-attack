<?php
/**
 * emp_scripts
 *
 * スクリプトのエンキュー
 *
 * @author まよいび
 * @since 2015-08-27
 *
 * @param NONE
 * @return callback
 */
function emp_scripts() {
	wp_enqueue_style( 'emp_style', get_stylesheet_uri(), array( 'yui_cssbase' ) );
	wp_enqueue_style( 'yui_cssbase', get_template_directory_uri() . '/css/cssbase.css' );
}
add_action( 'wp_enqueue_scripts', 'emp_scripts' );

function add_editor_styles() {
		add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'add_editor_styles' );

/**
 * Theme Supports
 */
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image' , 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );

add_theme_support( 'title-tag' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-thumbnails' );


function new_excerpt_more($more) {
	return '<span class="more-dot-1">.</span><span class="more-dot-2">.</span><span class="more-dot-3">.</span>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Pre get posts
  */
function emp_pre_get_posts( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'posts_per_page', '5' );
	}
}
add_action( 'pre_get_posts', 'emp_pre_get_posts' );

$args = array(
	'width' => 900,
	'height' => 200,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads' => true,
	'header-text' => false,
	'flex-height' => true,
	'flex-width' => false,
);

add_theme_support( 'custom-header', $args );

$args = array(
        'default-color' => 'ffeeff',
);

add_theme_support( 'custom-background', $args );

function _s_widgets_init() {
	register_sidebar( array(
		'name'					=> esc_html__( 'Sidebar', '_s' ),
		'id'						=> 'sidebar-1',
		'description'	 => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	 => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

	/**
	 * テーマカスタマイズ画面のカスタマイズ
	 *
	 * @link http://codex.wordpress.org/Theme_Customization_API
	 * @since MyTheme 1.0
	 */
	class MyTheme_Customize
	{

		 /**
			* このフックは WP3.4から利用可能な 'customize_register' をフックし、
			* テーマカスタマイズ画面に新しいセクションとコントロールを追加します。
			*
			* 注意：即時反映するには JavaScript を書く必要があります。
			* 　　　詳しくは live_preview() を参照。
			*
			* @see add_action('customize_register',$func)
			* @param \WP_Customize_Manager $wp_customize
			* @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
			* @since MyTheme 1.0
			*/
		 public static function register ( $wp_customize )
		 {

				//1. （必要なら）テーマカスタマイザー上に新しいセクションを追加します。
				$wp_customize->add_section( 'mytheme_options',
					 array(
							'title' => __( 'MyTheme Options', 'mytheme' ), //セクションのタイトル
							'priority' => 35, //セクションの表示順序
							'capability' => 'edit_theme_options', //権限
							'description' => __('Allows you to customize some example settings for MyTheme.', 'mytheme'), //ツールチップ表示内容
					 )
				);

				//2. WPデータベースに新しいテーマ設定を追加します。
				$wp_customize->add_setting( 'mytheme_options[link_textcolor]', //シリアライズしたテーマ設定名 (すべての設定はDBの1レコードに格納されます)
					 array(
							'default' => '#2BA6CB', //デフォルト値
							'type' => 'option', //'option' または 'theme_mod'
							'capability' => 'edit_theme_options', //（任意）アクセス権限
							'transport' => 'postMessage', //テーマ設定値更新のトリガー。'refresh' または 'postMessage'（即時反映）
							'sanitize_callback' => 'sanitize_text_field',
					 )
				);


				//3. コントロール（テーマ設定をセクションに紐づけてフォームコントロールを出力します）を追加します。
				$wp_customize->add_control( new WP_Customize_Color_Control( //カラーコントロールクラスを生成します
					 $wp_customize, // （必須）$wp_customize オブジェクト
					 'mytheme_link_textcolor', //コントロールの ID属性値
					 array(
							'label' => __( 'Link Color', 'mytheme' ), //管理画面に表示するコントロール名
							'section' => 'colors', //このコントロールを出力するセクションのID名（追加したものか、ビルトインセクション）
							'settings' => 'mytheme_options[link_textcolor]', //シリアライズしたテーマ設定名
							'priority' => 10, //セクション内での表示順序
					 )
				) );

				//4. JavaScript で即時反映するために、ビルトインテーマ設定の transport 指定を変更することもできます。
				$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
				$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
				$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
				$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
		 }

		 /**
			* ライブプレビュー中の <head> 内に CSS を出力します。
			*
			* 実行されるフック: 'wp_head'
			*
			* @see add_action('wp_head',$func)
			* @since MyTheme 1.0
			*/
		 public static function header_output() {
				?>
				<style type="text/css">
						 <?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?>
						 <?php self::generate_css('body', 'background-color', 'background_color', '#'); ?>
						 <?php self::generate_css('a', 'color', 'link_textcolor'); ?>
				</style>
				<?php
		 }

		 /**
			* 即時反映のための JavaScript をエンキューします。
			* この関数はテーマ設定で 'transport'=>'postMessage' を指定した場合のみ必要です。
			*
			* 実行されるフック: 'customize_preview_init'
			*
			* @see add_action('customize_preview_init',$func)
			* @since MyTheme 1.0
			*/
		 public static function live_preview() {
				wp_enqueue_script(
						 'mytheme-themecustomizer', // Give the script a unique ID
						 get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
						 array( 'jquery', 'customize-preview' ), // Define dependencies
						 '', // Define a version (optional)
						 true // Specify whether to put in footer (leave this true)
				);
		 }

			/**
			 * <head> 内に出力する CSS を作成します。
			 * $mod_name 設定が未定義の場合は、何も出力しません。
			 *
			 * @uses get_theme_mod()
			 * @param string $selector CSSセレクタ。
			 * @param string $style 変更する CSS *プロパティ* 名。
			 * @param string $mod_name 'theme_mod' 設定の名前。
			 * @param string $prefix （任意）CSS プロパティの前に出力する内容。
			 * @param string $postfix （任意）CSS プロパティの後に出力する内容。
			 * @param bool $echo （任意）出力するか否か (デフォルト：true)。
			 * @return string セレクタとプロパティからなる1行の CSS を返します。
			 * @since MyTheme 1.0
			 */
			public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true) {
				$return = '';
				$mod = get_theme_mod($mod_name);
				if ( ! empty( $mod ) ) {
					 $return = sprintf('%s { %s:%s; }',
							$selector,
							$style,
							$prefix.$mod.$postfix
					 );
					 if ( $echo ) {
							echo $return;
					 }
				}
				return $return;
			}

	}

	// テーマ設定やコントロールをセットアップします。
	add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );

	// ライブプレビュー中のサイトに CSS を出力します。
	add_action( 'wp_head' , array( 'MyTheme_Customize' , 'header_output' ) );

	// 即時反映用の JavaScript をエンキューします。
	add_action( 'customize_preview_init' , array( 'MyTheme_Customize' , 'live_preview' ) );

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function emp_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'emp_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'emp_content_width', 0 );


function init_emp_copyright( $text ) {
	if( !$text ) :
		$text = 'Copyright &copy; ' . get_bloginfo( 'name' ) . ' All Rights Reserved.';
	endif;
	return $text;
}
add_filter( 'emp_copyright', 'init_emp_copyright', 10, 1 );
