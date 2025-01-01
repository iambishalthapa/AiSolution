<?php

namespace Cozy_Addons;

/**
 * Class Cozy_Addons
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Cozy_Addons_Elementor_Widgets {


	public static $cozy_addons_pro_widget_stub = array(
		'addons' => array(
			'cozy_addons_faq'                   => array(
				'title'       => 'FAQ',
				'description' => '',
				'enable'      => false,
				'slug'        => 'faq',
				'icon'        => 'cozy-widget-icons eicon-comments',
				'keywords'    => 'cozy addons faq toggle',
			),
			'cozy_addons_service'               => array(
				'title'       => 'Service',
				'description' => '',
				'enable'      => false,
				'slug'        => 'service',
				'icon'        => 'cozy-widget-icons eicon-tools',
				'keywords'    => 'cozy addons services',
			),
			'cozy_addons_portfolio'             => array(
				'title'       => 'Portfolio',
				'description' => '',
				'enable'      => false,
				'slug'        => 'portfolio',
				'icon'        => 'cozy-widget-icons  eicon-gallery-justified',
				'keywords'    => 'cozy addons portfolio',
			),
			'cozy_addons_promotion'             => array(
				'title'       => 'Promotion',
				'description' => '',
				'enable'      => false,
				'slug'        => 'promotion',
				'icon'        => 'cozy-widget-icons eicon-posts-ticker',
				'keywords'    => 'cozy addons promotion',
			),
			'cozy_addons_blogpost'              => array(
				'title'       => 'Blog Posts',
				'description' => '',
				'enable'      => false,
				'slug'        => 'blogpost',
				'icon'        => 'cozy-widget-icons eicon-posts-grid',
				'keywords'    => 'cozy addons blog posts',
			),
			'cozy_addons_wooslider'             => array(
				'title'       => 'Product Slider',
				'description' => '',
				'enable'      => false,
				'slug'        => 'wooslider',
				'icon'        => 'cozy-widget-icons eicon-post-slider',
				'keywords'    => 'Cozy Addons WooCommerce Product Slider Woo',
			),
			'cozy_addons_woo_categories'        => array(
				'title'       => 'Product Categories',
				'description' => '',
				'enable'      => false,
				'slug'        => 'woocategories',
				'icon'        => 'cozy-widget-icons eicon-product-categories',
				'keywords'    => 'cozy addons woo product category',
			),
			'cozy_addons_cfseven'               => array(
				'title'       => 'Contact Form 7 Styler',
				'description' => '',
				'enable'      => false,
				'slug'        => 'contactform7',
				'icon'        => 'cozy-widget-icons eicon-form-horizontal',
				'keywords'    => 'cozy addons contact form 7',
			),
			'cozy_addons_typeouttext'           => array(
				'title'       => 'Typeout Text',
				'description' => '',
				'enable'      => false,
				'slug'        => 'typeouttext',
				'icon'        => 'cozy-typeout-text cozy-widget-icons eicon-animation-text',
				'keywords'    => 'cozy addons typeout text',
			),
			'cozy_addons_hoverbox'              => array(
				'title'       => 'Hover Box',
				'description' => '',
				'enable'      => false,
				'slug'        => 'hoverbox',
				'icon'        => 'cozy-widget-icons eicon-image-rollover',
				'keywords'    => 'cozy addons hover box',
			),
			'cozy_addons_advanced_magblock'     => array(
				'title'       => 'Magazine Block',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'advancemagblock',
				'icon'        => 'cozy-widget-icons eicon-posts-carousel',
				'keywords'    => 'cozy addons magazine news posts',
			),
			'cozy_addons_sitemap'               => array(
				'title'       => 'Sitemap',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'sitemap',
				'icon'        => 'cozy-widget-icons eicon-sitemap',
				'keywords'    => 'cozy addons sitemap',
			),
			'cozy_addons_navmenu'               => array(
				'title'       => 'Navigation Menu',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'nav-menu',
				'icon'        => 'cozy-widget-icons eicon-nav-menu',
				'keywords'    => 'cozy navigation menu',
			),
			'cozy_addons_minicart'              => array(
				'title'       => 'Menu Cart',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'minicart',
				'icon'        => 'eicon-cart-light cozy-cart-icon cozy-widget-icons',
				'keywords'    => 'cozy menu minicart header cart icon',
			),
			'cozy_addons_sidebar_panel'         => array(
				'title'       => 'Sidebar Panel',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'sidebar-panel',
				'icon'        => 'eicon-post cozy-sidebarpanel-icon cozy-widget-icons',
				'keywords'    => 'sidebar panel hamburger',
			),
			'cozy_addons_menu_search'           => array(
				'title'       => 'Menu Search',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'menu-search',
				'icon'        => 'eicon-search cozy-menusearch-icon cozy-widget-icons',
				'keywords'    => 'menu search icon',
			),
			'cozy_addons_toggle_content'        => array(
				'title'       => 'Toggle Content',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'content-toggle',
				'icon'        => 'eicon-toggle cozy-toggle-icon cozy-widget-icons',
				'keywords'    => 'toggle content switcher',
			),
			'cozy_addons_footer_copyright_text' => array(
				'title'       => 'Footer Copyirght Text',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'footer-copyright-text',
				'icon'        => 'eicon-footer cozy-widget-icons',
				'keywords'    => 'footer copyright text',
			),
			'cozy_addons_date_time'             => array(
				'title'       => 'Date & Time',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'date-and-time',
				'icon'        => 'eicon-clock-o cozy-clock-icon cozy-widget-icons',
				'keywords'    => 'dynamic current date and time',
			),
			'cozy_addons_my_account'            => array(
				'title'       => 'My Account',
				'cozy-addons',
				'description' => '',
				'enable'      => false,
				'slug'        => 'my-account',
				'icon'        => 'eicon-user-circle-o cozy-account-icon cozy-widget-icons',
				'keywords'    => 'Woocommer my account icon',
			),

		),
	);
	/**
	 * widget_style
	 *
	 * Load main style files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function cozy_addons_widget_styles() {
		wp_enqueue_style( 'elementor-frontend' );
		wp_enqueue_style( 'elementor-icons' );
		wp_enqueue_style( 'widgets-style', plugins_url( 'public/css/widgets-style.css', __FILE__ ), array(), COZY_ADDONS_VERSION, true );
		wp_enqueue_style( 'swiper-bundle', plugins_url( 'public/css/swiper-bundle.css', __FILE__ ), array(), COZY_ADDONS_VERSION, true );
		wp_enqueue_script( 'swiper-bundle', COZY_ADDONS_PLUGIN_URL . '/public/js/swiper-bundle.js', array( 'jquery' ), COZY_ADDONS_VERSION, true );
		wp_enqueue_script( 'typeout-core', COZY_ADDONS_PLUGIN_URL . '/public/js/core.js', array( 'jquery' ), COZY_ADDONS_VERSION, true );
		wp_enqueue_script( 'easy-news-ticker', COZY_ADDONS_PLUGIN_URL . '/public/js/jquery.easy-ticker.min.js', array( 'jquery' ), COZY_ADDONS_VERSION, true );
		wp_enqueue_script( 'cozy-scripts', COZY_ADDONS_PLUGIN_URL . '/public/js/cozy-scripts.js', array( 'jquery' ), COZY_ADDONS_VERSION, true );
		wp_localize_script(
			'cozy-scripts',
			'ajax_object',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	public function cozy_addons_admin_enqueue_styles() {
		wp_enqueue_style( 'cozy-dashboard-style', COZY_ADDONS_PLUGIN_URL . '/admin/css/cozy-dashboard-style.css', COZY_ADDONS_VERSION, 'all' );
	}


	/**
	 * Custom Scripts for pro stubs
	 *
	 * Load custom scripts files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function cozy_adoons_admin_scripts() {
		wp_enqueue_script( 'cozy-addons-scripts', COZY_ADDONS_PLUGIN_URL . '/admin/js/cozy-addons-scripts.js', array( 'jquery' ), COZY_ADDONS_VERSION, true );
	}
	// function cozy_admin_enqueue_custom_scripts()
	// {
	// wp_enqueue_script('cozy-addons-admin-scripts', COZY_ADDONS_PLUGIN_URL . '/admin/js/cozy-addons-admin.js', array('jquery'), '', true);
	// }

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_file() {
		require_once __DIR__ . '/admin/inc/widgets/pricing-tables.php';
		require_once __DIR__ . '/admin/inc/widgets/cta.php';
		require_once __DIR__ . '/admin/inc/widgets/slides.php';
		require_once __DIR__ . '/admin/inc/widgets/flip-box.php';
		require_once __DIR__ . '/admin/inc/widgets/teams.php';
		require_once __DIR__ . '/admin/inc/widgets/faq.php';
		require_once __DIR__ . '/admin/inc/widgets/testimonial.php';
		require_once __DIR__ . '/admin/inc/widgets/services.php';
		require_once __DIR__ . '/admin/inc/widgets/promotions.php';
		require_once __DIR__ . '/admin/inc/widgets/portfolio.php';
		require_once __DIR__ . '/admin/inc/widgets/blog-layout.php';
		require_once __DIR__ . '/admin/inc/widgets/woo-layout.php';
		require_once __DIR__ . '/admin/inc/widgets/popular-post.php';
		require_once __DIR__ . '/admin/inc/widgets/working-hour.php';
		require_once __DIR__ . '/admin/inc/widgets/hover-box.php';
		require_once __DIR__ . '/admin/inc/widgets/multi-buttons.php';
		require_once __DIR__ . '/admin/inc/widgets/cfseven-styler.php';
		require_once __DIR__ . '/admin/inc/widgets/product-slide.php';
		require_once __DIR__ . '/admin/inc/widgets/price-list.php';
		require_once __DIR__ . '/admin/inc/widgets/brands.php';
		require_once __DIR__ . '/admin/inc/widgets/advance-header.php';
		require_once __DIR__ . '/admin/inc/widgets/typeout-text.php';
		require_once __DIR__ . '/admin/inc/widgets/post-slider.php';
		require_once __DIR__ . '/admin/inc/widgets/magazine-block.php';
		require_once __DIR__ . '/admin/inc/widgets/advanced-magblock.php';
		require_once __DIR__ . '/admin/inc/widgets/focus-posts.php';
		require_once __DIR__ . '/admin/inc/widgets/authorbox.php';
		require_once __DIR__ . '/admin/inc/widgets/cozy-searchbox.php';
		require_once __DIR__ . '/admin/inc/widgets/product-categories.php';
		require_once __DIR__ . '/admin/inc/widgets/travel-list.php';
		require_once __DIR__ . '/admin/inc/widgets/properties-list.php';
		require_once __DIR__ . '/admin/inc/widgets/course-list.php';
		require_once __DIR__ . '/admin/inc/widgets/site-logo.php';
		require_once __DIR__ . '/admin/inc/widgets/pagelist.php';
		require_once __DIR__ . '/admin/inc/widgets/post-categories.php';
		require_once __DIR__ . '/admin/inc/widgets/sitemap.php';
		require_once __DIR__ . '/admin/inc/widgets/nav-menu.php';
		require_once __DIR__ . '/admin/inc/widgets/minicart.php';
		require_once __DIR__ . '/admin/inc/widgets/sidebar-panel.php';
		require_once __DIR__ . '/admin/inc/widgets/menusearch.php';
		require_once __DIR__ . '/admin/inc/widgets/content-toggle.php';
		require_once __DIR__ . '/admin/inc/widgets/menu-account.php';
		require_once __DIR__ . '/admin/inc/widgets/events-list.php';
		require_once __DIR__ . '/admin/inc/widgets/footer-copyright.php';
		require_once __DIR__ . '/admin/inc/widgets/dynamic-timezone.php';
	}
	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		$enable_widgets = get_option( 'cozy_addons_elementor_widgets_enabled' );

		if ( '1' === $enable_widgets ) {
			\Elementor\Plugin::instance()->widgets_manager->register( new PricingTableWidgets\Cozy_Addons_Pricing_Table_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new CTAWidgets\Cozy_Addons_CTA_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new FlipBoxWidgets\Cozy_Addons_FlipBox_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new WorkingHourWidgets\Cozy_Addons_WorkingHour_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new MultiButtonWidgets\Cozy_Addons_MultiButton_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new BrandDisplayWidgets\Cozy_Addons_BrandDisplay_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new AdvanceHeaderWidgets\Cozy_Addons_AdvanceHeader_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new MagBlockWidgets\Cozy_Addons_MagBlock_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new PostSliderWidgets\Cozy_Addons_PostSlider_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new PopularPostWidgets\Cozy_Addons_PopularPost_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new FocusPostsWidgets\Cozy_Addons_FocusPost_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new AuthorBoxWidgets\Cozy_Addons_AuthorBox_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new SearchBoxWidgets\Cozy_Addons_SearchBox_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new TravelAgencyWidgets\Cozy_Addons_Travel_Agency_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new PropertiesListWidgets\Cozy_Addons_Properties_List_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new CourseListWidgets\Cozy_Addons_Course_List_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new SiteLogoWidgets\Cozy_Addons_SiteLogo_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new PageListWidgets\Cozy_Addons_PageList_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new PostCategoriesWidgets\Cozy_Addons_PostCategories_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new SliderWidgets\Cozy_Addons_Slider_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new TestimonialWidgets\Cozy_Addons_Testimonial_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new TeamWidgets\Cozy_Addons_Team_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new WooLayoutWidgets\Cozy_Addons_WooLayout_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new PriceListWidgets\Cozy_Addons_PriceList_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new EventsListWidgets\Cozy_Addons_EventsList_Widget() );

			if ( cozy_addons_premium_access() ) {
				\Elementor\Plugin::instance()->widgets_manager->register( new FAQWidgets\Cozy_Addons_Faq_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new ServiceWidgets\Cozy_Addons_Service_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new PortfolioWidgets\Cozy_Addons_Portfolio_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new PromotionWidgets\Cozy_Addons_Promotion_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new BlogLayoutWidgets\Cozy_Addons_BlogLayout_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new WOOSlideWidgets\Cozy_Addons_WOOSlide_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new CFSevenWidgets\Cozy_Addons_CFSeven_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new TypeoutTextWidgets\Cozy_Addons_TypeoutText_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new HoverBoxWidgets\Cozy_Addons_HoverBox_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new AdvancedMagBlockWidgets\Cozy_Addons_Advanced_MagBlock_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new WOOCategoriesWidgets\Cozy_Addons_WooCategories_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new SiteMapWidgets\Cozy_Addons_SiteMap_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new NavMenuWidgets\Cozy_Addons_Nav_Menu_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new MiniCartWidgets\Cozy_Addons_MiniCart_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new SidebarPanelWidgets\Cozy_Addons_SidebarPanel_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new MenuSearchWidgets\Cozy_Addons_MenuSearch_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new ToggleContentWidgets\Cozy_Addons_ToggleContent_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new FooterCopyrightWidgets\Cozy_Addons_FooterCopyright_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new DynamicTimezoneWidgets\Cozy_Addons_DynamicTimezone_Widget() );
				\Elementor\Plugin::instance()->widgets_manager->register( new MenuAccountWidgets\Cozy_Addons_MenuAccount_Widget() );
			}
		}
	}
	/**
	 * Register New Widget
	 *
	 * Include widgets files and register them in Elementor.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function cozy_addons_widgets_registered() {

		$this->include_file();
		$this->register_widgets();
	}

	public function register_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'cozy-addons-items',
			array(
				'title' => __( 'Cozy Addons', 'cozy-addons' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}

	/***
	 * register pro stub widgets for the free plugins
	 */
	public function get_stub_widgets( $settings ) {

		if ( cozy_addons_premium_access() ) {
			return $settings;
		}
		$promotion_widgets = array();
		if ( isset( $settings['promotionWidgets'] ) ) {
			$promotion_widgets = $settings['promotionWidgets'];
		}

		$cozy_addons_stub_widgets = self::$cozy_addons_pro_widget_stub['addons'];

		$ctWidgets = array();
		foreach ( $cozy_addons_stub_widgets as $stub ) {
			$ctWidgets[] = array(
				'name'       => $stub['slug'],
				'icon'       => $stub['icon'],
				'title'      => $stub['title'],
				'categories' => '[ "cozy-addons-items" ]',
			);
		}

		$mergedArray                  = array_merge( $promotion_widgets, $ctWidgets );
		$settings['promotionWidgets'] = $mergedArray;

		return $settings;
	}
	public function __construct() {

		// Register widget style
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'cozy_addons_widget_styles' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'cozy_addons_admin_enqueue_styles' ) );
		add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'cozy_adoons_admin_scripts' ) );
		add_action( 'elementor/preview/enqueue_styles', array( $this, 'cozy_adoons_admin_scripts' ) );
		// add_action('elementor/editor/after_enqueue_scripts', [$this, 'cozy_admin_enqueue_custom_scripts']);
		add_action( 'admin_enqueue_scripts', array( $this, 'cozy_adoons_admin_scripts' ) );
		// Register widgets
		add_action( 'elementor/widgets/register', array( $this, 'cozy_addons_widgets_registered' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_elementor_widget_categories' ) );

		$enable_widgets = get_option( 'cozy_addons_elementor_widgets_enabled' );

		if ( '1' === $enable_widgets ) {
			add_filter( 'elementor/editor/localize_settings', array( $this, 'get_stub_widgets' ) );
		}
		// add_action('wp_enqueue_scripts', [$this, 'ct_custom_scripts_loading']);
	}
}

// Instantiate Plugin Class
new Cozy_Addons_Elementor_Widgets();
