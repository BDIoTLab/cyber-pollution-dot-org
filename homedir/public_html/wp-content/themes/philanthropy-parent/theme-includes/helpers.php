<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

/**
 * Helper functions and classes with static methods for usage in theme
 */

// TODO: separate functions in specific files

if( ! function_exists( 'the_core_get_the_archive_title' ) ) :
	/**
	 * Get the archive title
	 */
	function the_core_get_the_archive_title() {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = get_the_author();
		} elseif ( is_year() ) {
			$title = get_the_date( _x( 'Y', 'yearly archives date format', 'the-core' ) );
		} elseif ( is_month() ) {
			$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'the-core' ) );
		} elseif ( is_day() ) {
			$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'the-core' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'the-core' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'the-core' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( esc_html__( '%1$s: %2$s', 'the-core' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = esc_html__( 'Archives', 'the-core' );
		}

		/**
		 * Filter the archive title.
		 *
		 * @since 4.1.0
		 *
		 * @param string $title Archive title to be displayed.
		 */
		return apply_filters( 'the_core_get_the_archive_title', $title );
	}
endif;


if ( ! function_exists( 'the_core_render_view' ) ) :
	/**
	 * Safe render a view and return html
	 * In view will be accessible only passed variables
	 * Use this function to not include files directly and to not give access to current context variables (like $this)
	 * @param string $file_path
	 * @param array $view_variables
	 * @param bool $return In some cases, for memory saving reasons, you can disable the use of output buffering
	 * @return string HTML
	 */
	function the_core_render_view( $file_path, $view_variables = array(), $return = true ) {
		extract( $view_variables, EXTR_REFS );

		unset( $view_variables );

		if ( $return ) {
			ob_start();

			require $file_path;

			return ob_get_clean();
		} else {
			require $file_path;
		}
	}
endif;


if ( ! function_exists( 'the_core_get_featured_posts' ) ) :
	/**
	 * Getter function for Featured Content Plugin.
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	function the_core_get_featured_posts() {
		return apply_filters( 'the_core_get_featured_posts', array() );
	}
endif;


if ( ! function_exists( 'the_core_match_aspect_ratio_class' ) ) {
	/**
	 * Match aspect ratio af an image.
	 *
	 * the_core_match_aspect_ratio_class(1.332) => fw-ratio-4-3
	 * the_core_match_aspect_ratio_class(1.777) => fw-ratio-16-9
	 * the_core_match_aspect_ratio_class(295, 166) => fw-ratio-16-9
	 */
	function the_core_match_aspect_ratio_class( $ratio, $h = 0 ) {
		$precision = 0.02;
		if ( $h ) {
			$ratio = round( $ratio / $h, 3 );
		}
		$ratios = array(
			'1'      => 'fw-ratio-1',     //1:1
			'2'      => 'fw-ratio-2-1',   //2:1
			'0.5'    => 'fw-ratio-1-2',   //1:2
			'1.333'  => 'fw-ratio-4-3',   //4:3
			'0.75'   => 'fw-ratio-3-4',   //3:4
			'1.777'  => 'fw-ratio-16-9',  //16:9
			'0.5625' => 'fw-ratio-9-16',  //9:16
			'1.5'    => 'fw-ratio-3-2',   //3:2
			'0.666'  => 'fw-ratio-2-3',   //2:3
			'1.666'  => 'fw-ratio-5-3',   //5:3
			'0.6'    => 'fw-ratio-3-5',   //3:5
			'1.6'    => 'fw-ratio-16-10', //16:10
			'0.625'  => 'fw-ratio-10-16'  //10:16
		);

		$_ratio = 'set';
		$min    = 10000;
		foreach ( $ratios as $key => $value ) {
			$key = (float) $key;
			if ( $ratio === $key ) {
				// we have an equal-ratio; no need to check anything else!
				return $value;
			} elseif ( abs( $ratio - $key ) < $min ) {
				$min = abs( $ratio - $key );
				if ( $min != 10000 && $min > $precision ) {
					continue;
				}
				$_ratio = $value;
			}
		}

		//if(!isset($_ratio)) return 'srcset';
		return $_ratio;
	}
}


if ( ! function_exists( 'the_core_image' ) ) {
	/**
	 * Get responsive image
	 *
	 * @param int|array $attachment = array('attachment_id','url') or $attachment_id
	 * @param array $args
	 *
	 * @return array|string
	 */
	function the_core_image( $attachment = null, $args = null ) {
		$defaults = array(
			'ratio' => 'fw-ratio-16-9',
			'size' => 'thumbnail',
			'img_attr' => array(),
			'isbg' => false,
			'return' => false
		);
		extract( wp_parse_args($args, $defaults) );

		/** get attachment id */
		if ( is_array( $attachment ) && isset( $attachment['attachment_id'] ) && ( isset( $attachment['url'] ) || isset( $attachment['src'] ) ) ) {
			$attachment_id = (int) $attachment['attachment_id'];
			//$file_url = !empty($attachment['url']) ? $attachment['url'] : $attachment['src'];
			$file_url = wp_get_attachment_url($attachment_id);
		} else {
			$attachment_id = (int) $attachment;
		}

		if ( ! $attachment_id || ! ( get_post( $attachment_id ) instanceof WP_Post ) ) {
			if ( ! $attachment_id = get_post_thumbnail_id() ) {
				// predefined templates images from server, or placeholder image
				if( isset( $attachment['url'] ) && ! empty( $attachment['url'] ) ) {
					$img = '<img src="' . $attachment['url'] . '" alt="" />';
					return ( $return ) ? array( 'img' => $img, 'ratio' => $args['ratio'], 'original_image_url' => $attachment['url'], 'caption' => '' ) : $img;
				}
				return false;
			}
		}

		$imagedata = wp_get_attachment_metadata( $attachment_id );

		/** user can disable responsive for images from config file */
		$enable_responsive_images = (function_exists('fw')) ? fw()->theme->get_config('lazy_responsive_images', true) : true;

		/** if disabled responsive images, get the image size specified in argument 'size', like wordpress do */
		if ( !$enable_responsive_images ) {
			$_image = image_downsize($attachment_id, $size);
			$file_url = $_image[0];
			$img_ratio = the_core_match_aspect_ratio_class( $_image[1], $_image[2] );
		}

		if ( empty( $file_url ) ) {
			$file_url = wp_get_attachment_url( $attachment_id );
		}

		//fw_cdn_link(); //TODO CDN links

		$caption = '';
		/** for img tag only */
		if ( !$isbg ) {
			$attachment = get_post( $attachment_id );
			// get the excerpt for curret attachement id if is not empty post_excerpt
			if( isset($attachment->post_excerpt) && !empty($attachment->post_excerpt) ) {
				$caption = get_the_excerpt($attachment_id);
			}

			$default_attr = array(
				'src' => $file_url,
				'alt' => trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ), // Use Alt field first
				'data-maxdpr' => '1.7'
			);
			if ( empty( $default_attr['alt'] ) ) {
				$default_attr['alt'] = trim( strip_tags( $caption ) );
			} // If not, Use the Caption
			if ( empty( $default_attr['alt'] ) ) {
				$default_attr['alt'] = trim( strip_tags( get_the_title($attachment_id) ) );
			} // Finally, use the title

			$attr          = wp_parse_args( $img_attr, $default_attr );
			$attr          = apply_filters( 'wp_get_attachment_image_attributes', $attr, $attachment );
			$attr          = array_map( 'esc_attr', $attr );

			if ( $enable_responsive_images )
				$attr['class'] = isset($attr['class']) ? $attr['class'] . ' lazyload' : 'lazyload';

			$file_parts = pathinfo($file_url);
			if( isset($file_parts['extension']) && 'svg' === $file_parts['extension'] ) {
				$attr['class'] .= ' fw-svg-file';
			}

			$html_attr     = '';
			foreach ( $attr as $name => $value ) {
				if ($name == 'src') continue;
				$html_attr .= " $name=" . '"' . $value . '"';
			}
		}

		if ( $enable_responsive_images ) {
			/** group images by ratio in urls array */
			if (!empty($attr['src'])) $file_url = $attr['src'];
			$urls = array();
			if ( ! empty( $imagedata['sizes'] ) ) {
				$path = pathinfo($file_url);
				$dir  = $path['dirname'];
				foreach ( $imagedata['sizes'] as $_size => $data ) {
					$img_ratio = the_core_match_aspect_ratio_class( $data['width'], $data['height'] );
					if ($img_ratio != 'set') {
						$urls[ $img_ratio ][] = path_join( $dir, $data['file'] ) . ' ' . $data['width'] . 'w';
					}
				}
			}

			/** add original size */
			if( !empty($imagedata) ) {
				$img_ratio = the_core_match_aspect_ratio_class($imagedata['width'], $imagedata['height']);
				if ( $img_ratio != 'set' ) {
					$urls[$img_ratio][] = $file_url . ' ' . $imagedata['width'] . 'w';
				}
				else {
					$urls[$img_ratio][] = $file_url;
				}
			}
			else {
				$img_ratio = 'set';
				$urls[$img_ratio][] = $file_url;
			}

			/** by default take original aspect ratio, if argument $ratio is set, use this instead */
			if (!empty($ratio) && !empty($urls[$ratio])) $img_ratio = $ratio;
			$srcset = '';
			$bgset  = ( $isbg ) ? 'bg' : 'src';
			$srcset .= 'data-' . $bgset . 'set="' . implode( ", ", $urls[ $img_ratio ] ) . '" ';
		}

		$ratio_class = ($img_ratio != 'set') ? $img_ratio : 'fw-noratio';


		//src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="

		if ( $isbg ) {

			if ( $enable_responsive_images ) {
				$bg = ' style="background-image: url(data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==);" ' . $srcset;
			} else {
				$bg = ' style="background-image: url('.$file_url.');" ';
			}
			$ratio_class .= ' fw-ratio-container';

			return ( $return ) ? array( 'img' => $bg, 'ratio' => $ratio_class, 'original_image_url' => $file_url ) : $bg;

		} else {

			if ( $enable_responsive_images ) {
				if ( ! is_admin() || ( function_exists('wp_doing_ajax') && wp_doing_ajax() ) ) {
					$img = '<noscript itemscope itemtype="https://schema.org/ImageObject" itemprop="image"><img src="' . $file_url . '" ' . $html_attr . ' />';
					// meta for markup
					$img .= '<meta itemprop="url" content="' . $file_url . '">';
					if ( isset( $imagedata['width'] ) ) {
						$img .= '<meta itemprop="width" content="' . $imagedata['width'] . '">';
					}
					if ( isset( $imagedata['height'] ) ) {
						$img .= '<meta itemprop="height" content="' . $imagedata['height'] . '">';
					}
					// meta for markup
					$img .= '</noscript>';
					$img .= '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-sizes="auto" ' . $srcset . ' ' . $html_attr . ' />';
					// for reserve space for no-ratio images
					if ( $ratio_class == 'fw-noratio' ) {
						if ( ! empty( $imagedata ) && $imagedata['width'] != 0 ) {
							$img .= '<span class="fw-after-no-ratio" style="padding-bottom: ' . ( ( $imagedata['height'] / $imagedata['width'] ) * 100 ) . '%"></span>';
						}
					}
				} else {
					/* fixed problem when is generated content for SEO plugin */
					$img = '<img src="' . $file_url . '" ' . $html_attr . ' />';
				}
			} else {
				if ( ! is_admin() || ( function_exists('wp_doing_ajax') && wp_doing_ajax() ) ) {
					$img = '<img itemprop="image" src="' . $file_url . '" ' . $html_attr . ' />';
					// meta for markup
					$img .= '<meta itemprop="url" content="' . $file_url . '">';
					if ( isset( $imagedata['width'] ) ) {
						$img .= '<meta itemprop="width" content="' . $imagedata['width'] . '">';
					}
					if ( isset( $imagedata['height'] ) ) {
						$img .= '<meta itemprop="height" content="' . $imagedata['height'] . '">';
					}
					// meta for markup
					if ( $ratio_class == 'fw-noratio' && ! empty( $imagedata ) && $imagedata['width'] != 0 ) {
						$img .= '<span class="fw-after-no-ratio" style="padding-bottom: ' . ( ( $imagedata['height'] / $imagedata['width'] ) * 100 ) . '%"></span>';
					}
				} else {
					/* fixed problem when is generated content for SEO plugin */
					$img = '<img src="' . $file_url . '" ' . $html_attr . ' />';
				}
			}
			$ratio_class .= ' fw-ratio-container';
			$img = apply_filters( 'post_thumbnail_html', $img, null, $attachment_id, $size, $attr );

			return ( $return ) ? array( 'img' => $img, 'ratio' => $ratio_class, 'original_image_url' => $file_url, 'caption' => trim( strip_tags( $caption ) ) ) : $img;
		}
	}
}


if ( ! function_exists( 'the_core_get_posts' ) ):
	/**
	 *  Generate array with: recent/popular/commented posts
	 *
	 * @param string $sort Sort type (recent/popular/most commented)
	 * @param integer $items Number of items to be extracted
	 * @param boolean $image_post Extract or no post image
	 * @param boolean $return_image_tag Return with tag <img
	 * @param boolean $return_for_the_core_image Return for the_core_image function
	 * @param integer $image_width Set width of post image
	 * @param integer $image_height Set height of post image
	 * @param string $image_class Set class of post image
	 * @param boolean $date_post Extract or no post date
	 * @param string $date_format Set date format
	 * @param string $post_type Set post type
	 * @param string $category Set category from where posts would be extracted
	 */
	function the_core_get_posts( $args = null ) {
		$defaults = array(
			'sort'                => 'recent',
			'items'               => 5,
			'image_post'          => true,
			'return_image_tag'    => true,
			'return_for_the_core_image' => false,
			'image_width'         => 54,
			'image_height'        => 54,
			'image_class'         => 'thumbnail',
			'date_post'           => true,
			'date_format'         => 'F jS, Y',
			'date_query'          => array(),
			'post_type'           => 'post',
			'category'            => '',
			'excerpt_length'      => 40
		);

		extract( wp_parse_args( $args, $defaults ) );
		global $post;
		$fw_cat_ID = ( ! empty( $category ) ) ? $category : '';

		if ( $sort == 'recent' ) {
			$query = new WP_Query( array(
				'post_type'      => $post_type,
				'orderby'        => 'post_date',
				'order '         => 'DESC',
				'cat'            => $fw_cat_ID,
				'posts_per_page' => $items,
				'date_query'     => $date_query
			) );
			$posts = $query->get_posts();
		} elseif ( $sort == 'popular' ) {
			$query = new WP_Query( array(
				'post_type'      => $post_type,
				'orderby'        => 'meta_value',
				'meta_key'       => 'fw_post_views',
				'order '         => 'DESC',
				'cat'            => $fw_cat_ID,
				'posts_per_page' => $items,
				'date_query'     => $date_query
			) );
			$posts = $query->get_posts();
		} elseif ( $sort == 'commented' ) {
			$query = new WP_Query( array(
				'post_type'      => $post_type,
				'orderby'        => 'comment_count',
				'order '         => 'DESC',
				'cat'            => $fw_cat_ID,
				'posts_per_page' => $items,
				'date_query'     => $date_query
			) );
			$posts = $query->get_posts();
		} else {
			return false;
		}

		$fw_post_option = array();
		$the_core_count          = 0;
		if ( ! empty( $posts ) ) {
			foreach ( $posts as $post_elm ) {
				setup_postdata( $post_elm );
				$img = '';

				if ( $image_post == true ) {
					$post_thumbnail_id = get_post_thumbnail_id( $post_elm->ID );
					$post_thumbnail    = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );

					if ( ! empty( $post_thumbnail ) ) {
						$img = function_exists('fw_resize') ? fw_resize( $post_thumbnail[0], $image_width, $image_height, true ) : $post_thumbnail[0];
						if ( $return_for_the_core_image ) {
							$img = array(
								'attachment_id' => $post_thumbnail_id,
								'url'           => $post_thumbnail[0],
							);
						} elseif ( $return_image_tag ) {
							$img = '<img src="' . $image . '" class="' . $image_class . '" alt="' . get_the_title( $post_thumbnail_id ) . '" width="' . $image_width . '" height="' . $image_height . '" />';
						}
					}
				}

				if ( ! empty( $img ) ) {
					$fw_post_option[ $the_core_count ]['post_img'] = $img;
				} else {
					$fw_post_option[ $the_core_count ]['post_img'] = '';
				}

				if ( $date_post ) {
					$time_format                                = apply_filters( '_filter_widget_time_format', $date_format );
					$fw_post_option[ $the_core_count ]['post_date_post'] = get_the_time( $time_format, $post_elm->ID );
				} else {
					$fw_post_option[ $the_core_count ]['post_date_post'] = '';
				}

				$fw_post_option[ $the_core_count ]['post_class']        = ( is_singular() && $post->ID == $post_elm->ID ) ? 'current-menu-item post_' . $sort : 'post_' . $sort;
				$fw_post_option[ $the_core_count ]['post_title']        = get_the_title( $post_elm->ID );
				$fw_post_option[ $the_core_count ]['post_link']         = get_permalink( $post_elm->ID );
				$fw_post_option[ $the_core_count ]['post_author_link']  = get_author_posts_url( get_the_author_meta( 'ID' ) );
				$fw_post_option[ $the_core_count ]['post_author_name']  = get_the_author();
				$fw_post_option[ $the_core_count ]['post_comment_numb'] = get_comments_number( $post_elm->ID );
				$the_core_count ++;
			}
			wp_reset_postdata();
		}

		return $fw_post_option;
	}
endif;


if ( ! function_exists( 'the_core_paging_navigation' ) ) :
	/**
	 * Display archive/category pagination
	 *
	 * @param object $wp_query
	 */
	function the_core_paging_navigation( $wp_query = null ) {
		if ( ! $wp_query ) {
			$wp_query = $GLOBALS['wp_query'];
		}

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        $the_core_pagination_type = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('blog_pagination', 'paging-navigation-type-1') : 'paging-navigation-type-1';
        if( $the_core_pagination_type == 'paging-navigation-type-2' ) {
            $prev_text = esc_html__( 'Prev Page', 'the-core' );
            $next_text = esc_html__( 'Next Page', 'the-core' );
            $prev_icon = '<i>&larr;</i>';
            $next_icon = '<i>&rarr;</i>';
        }
        else {
            $prev_text = esc_html__( 'Newer', 'the-core' );
            $next_text = esc_html__( 'Older', 'the-core' );
            $prev_icon = '<i class="fa fa-angle-left"></i>';
            $next_icon = '<i class="fa fa-angle-right"></i>';
        }

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'type'      => 'array',
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => $prev_icon.'<strong>' . $prev_text . '</strong>',
			'next_text' => '<strong>' . $next_text . '</strong>'.$next_icon,
		) );

		if ( $links ) : ?>
			<nav class="navigation paging-navigation <?php echo esc_attr($the_core_pagination_type); ?>" role="navigation">
				<div class="pagination loop-pagination">
					<?php
					$next = get_next_posts_link();
					$prev = get_previous_posts_link();
					if ( empty( $prev ) ) {
						echo '<a href="javascript:void(0)" class="prev page-numbers disabled">'.$prev_icon.'<strong>' . $prev_text . '</strong></a>';
                        $begin_for = 0;
					}
                    else {
                        $begin_for = 1;
                    }

                    if ( empty( $next ) ) {
                        $end_for = count($links) - 1;
                    }
                    else {
                        $end_for = count($links) - 2;
                    }

                    // parse link in foreach for make a wrap only for numbers
                    foreach( $links as $key => $value ) {
                        if( $key == $begin_for ) {
                            echo '<div class="before-hr"></div>';
                            echo '<div class="pagination-numbers-wrap">';
                        }
                        echo ($value);
                        if( $key == $end_for ) {
                            echo '</div>';
                            echo '<div class="after-hr"></div>';
                        }
                    }

					if ( empty( $next ) ) {
						echo '<a href="javascript:void(0)" class="next page-numbers disabled"><strong>' . $next_text . '</strong>'.$next_icon.'</a>';
					}
					?>
				</div><!-- .pagination -->
			</nav><!-- .navigation -->
		<?php endif;
	}
endif;


if ( ! function_exists( 'the_core_logo' ) ):
	/**
	 * Display theme logo
	 *
	 * @param boolean $wrap
	 */
	function the_core_logo( $wrap = false ) {
		$the_core_logo_settings['logo']['selected_value']   = 'text';
		$the_core_logo_settings['logo']['text']['title']    = get_bloginfo( 'name' );
		$the_core_logo_settings['logo']['text']['subtitle'] = '';
		if ( defined( 'FW' ) ) {
			$the_core_logo_settings = fw_get_db_settings_option( 'logo_settings' );
		}
		?>
		<?php
		$empty_logo = false;
		if( $the_core_logo_settings['logo']['selected_value'] == 'image' ) {
			if( empty($the_core_logo_settings['logo']['image']['image_logo']) ) {
				$empty_logo = true;
			}
		} else {
			if( empty($the_core_logo_settings['logo']['text']['title']) && empty($the_core_logo_settings['logo']['text']['subtitle']) ) {
				$empty_logo = true;
			}
		} ?>
		<?php if( !$empty_logo ) : ?>
			<div class="fw-wrap-logo">
				<?php if ($wrap): ?>
					<div class="fw-container">
				<?php endif; ?>

					<?php if ( $the_core_logo_settings['logo']['selected_value'] == 'image' ) :
						$image_logo = $the_core_logo_settings['logo']['image']['image_logo'];
						if ( ! empty( $image_logo ) ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fw-site-logo">
								<img src="<?php echo function_exists('pll__') ? pll__( the_core_change_original_link_with_cdn( $image_logo['url'] ) ) : the_core_translate( the_core_change_original_link_with_cdn( $image_logo['url'] ) ); ?>" alt="<?php echo esc_url( bloginfo('name') ) ?>" />
							</a>
						<?php endif;
					else :
						if ( $the_core_logo_settings['logo']['text']['title'] != '' ) : ?>
							<a href="<?php echo esc_url( home_url('/') ); ?>" class="fw-site-logo">
								<strong class="site-title" itemprop="headline"><?php echo function_exists('pll__') ? pll__($the_core_logo_settings['logo']['text']['title']) : apply_filters('the_core_logo_title', $the_core_logo_settings['logo']['text']['title']); ?></strong>
								<?php if ( $the_core_logo_settings['logo']['text']['subtitle'] != '' ) : ?>
									<span class="site-description" itemprop="description"><?php echo function_exists('pll__') ? pll__($the_core_logo_settings['logo']['text']['subtitle']) : apply_filters('the_core_logo_subtitle', $the_core_logo_settings['logo']['text']['subtitle']); ?></span>
								<?php endif; ?>
							</a>
						<?php endif;
					endif; ?>

				<?php if ($wrap): ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php }
endif;


if ( ! function_exists( 'the_core_sticky_logo' ) ):
	/**
	 * Display header sticky logo
	 */
	function the_core_sticky_logo() {
		$the_core_sticky_logo = '';

		if ( defined( 'FW' ) ) :
			$the_core_general_settings = fw_get_db_settings_option();
			// if enabled sticky header
			if ( 'fw-header-sticky' == $the_core_general_settings['header_settings']['enable_sticky_header'] ) :

				// if is uploaded an image to sticky
				if ( ! empty( $the_core_general_settings['header_settings']['sticky_header_styling']['logo'] ) ) :
					// for header-3 need a wrap container
					if ( 'header-3' == $the_core_general_settings['header_settings']['header_type_picker']['header_type'] ) :
						$the_core_sticky_logo .= '<div class="fw-container">';
					endif;

					$the_core_sticky_logo .= '<a href="' . esc_url( home_url( '/' ) ) . '" class="fw-site-logo">
							<img src="' . the_core_translate( the_core_change_original_link_with_cdn( $the_core_general_settings['header_settings']['sticky_header_styling']['logo']['url'] ) ) . '" alt="' . esc_url( get_bloginfo( 'name' ) ) . '" />
						</a>';

					// for header-3 need a wrap container
					if ( 'header-3' == $the_core_general_settings['header_settings']['header_type_picker']['header_type'] ) :
						$the_core_sticky_logo .= '</div>';
					endif;
				endif;
			endif;
		endif;

		return $the_core_sticky_logo;
	}
endif;


if ( ! function_exists( 'the_core_post_meta' ) ) :
	/**
	 * Display post meta (date, category, author)
	 *
	 * @param string $post_id
	 * @param string $post_type
	 * @param array $atts
	 */
	function the_core_post_meta( $post_id, $post_type = 'post', $atts = array( 'extra_options' => array() ) ) {
		$the_core_permalink = get_permalink($post_id);
		$posts_general_settings = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings', '' ) : array();
		if( !empty( $atts['extra_options'] ) ) {
			// change general settings with extra options (from shortcode, or an other resource - only the values from extra_options)
			$posts_general_settings = array_merge( $posts_general_settings, $atts['extra_options'] );
		}
		$post_date       = isset( $posts_general_settings['post_date'] ) ? $posts_general_settings['post_date'] : '';
		$post_author     = isset( $posts_general_settings['post_author'] ) ? $posts_general_settings['post_author'] : '';
		$post_categories = isset( $posts_general_settings['post_categories'] ) ? $posts_general_settings['post_categories'] : '';

		if($post_date != 'no' || $post_author != 'no' || $post_categories != 'no') : ?>
			<div class="wrap-entry-meta">
				<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="https://google.com/article" content="" />
				<?php if ( $post_date != 'no' ) : ?>
					<span class="entry-date">
						<a rel="bookmark" href="<?php echo esc_url($the_core_permalink); ?>">
							<time itemprop="datePublished" datetime="<?php the_core_get_datetime_attribute(); ?>"><?php echo get_the_date(); ?></time>
							<meta itemprop="dateModified" content="<?php the_core_get_modified_date_attribute(); ?>">
						</a>
					</span>
				<?php endif; ?>
				<?php if ( $post_author != 'no' ) : ?>
					<?php if ( $post_date != 'no' ) : ?>
						<span class="separator">&nbsp;|&nbsp;</span>
					<?php endif; ?>
					<span itemscope="itemscope" itemtype="https://schema.org/Person" itemprop="author" class="author"> <?php esc_html_e( 'By', 'the-core' ); ?> <a rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span itemprop="name"><?php the_author(); ?></span></a></span>
					<span itemprop="publisher" itemtype="https://schema.org/Organization" itemscope="">
						<span itemprop="name" content="<?php echo esc_attr( bloginfo('name') ); ?>"></span>
						<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
							<meta itemprop="url" content="<?php the_core_logo_url(); ?>">
						</span>
					</span>
				<?php endif; ?>
				<?php if ( ( $post_categories != 'no' && $post_type != 'fw-learning-articles' ) && $post_type != 'lesson' ) : ?>
					<?php if ( ($post_author != 'no' || $post_date != 'no') && !is_single() ) : ?>
						<span class="separator">&nbsp;|&nbsp;</span>
					<?php endif; ?>
					<span class="cat-links"> <?php esc_html_e( 'In', 'the-core' ); ?> <?php echo the_core_cat_links( $post_type, $post_id ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif;
	}
endif;


if ( ! function_exists( 'the_core_post_meta_blog_2' ) ) :
	/**
	 * Display post meta for blog type 2 (date, category, author)
	 *
	 * @param string $post_id
	 * @param string $post_type
	 */
	function the_core_post_meta_blog_2( $post_id, $post_type = 'post', $atts = array( 'extra_options' => array() ) ) {
		$the_core_permalink = get_permalink($post_id);
		$posts_general_settings = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings', '' ) : array();
		if( !empty( $atts['extra_options'] ) ) {
			// change general settings with extra options (from shortcode, or an other resource - only the values from extra_options)
			$posts_general_settings = array_merge( $posts_general_settings, $atts['extra_options'] );
		}
		$post_date       = isset( $posts_general_settings['post_date'] ) ? $posts_general_settings['post_date'] : '';
		$post_author     = isset( $posts_general_settings['post_author'] ) ? $posts_general_settings['post_author'] : '';
		$post_categories = isset( $posts_general_settings['post_categories'] ) ? $posts_general_settings['post_categories'] : '';
		?>
        <?php if( $post_author != 'no' || $post_date != 'no' || $post_categories != 'no' ) : ?>
            <footer class="entry-meta clearfix">
                <div class="wrap-entry-meta">
	                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="https://google.com/article" content="" />
                    <?php if($post_author != 'no' || $post_date != 'no') : ?>
                        <div class="footer-meta">
                            <?php if ( $post_author != 'no' ) : ?>
								<span itemscope="itemscope" itemtype="https://schema.org/Person" itemprop="author" class="author"> <?php esc_html_e( 'By', 'the-core' ); ?> <a rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span itemprop="name"><?php the_author(); ?></span></a></span>
								<span itemprop="publisher" itemtype="https://schema.org/Organization" itemscope="">
									<span itemprop="name" content="<?php echo esc_attr( bloginfo('name') ); ?>"></span>
									<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
										<meta itemprop="url" content="<?php the_core_logo_url(); ?>">
									</span>
								</span>
                            <?php endif; ?>
                            <?php if ( $post_date != 'no' ) : ?>
                                <span class="entry-date">
	                                <a rel="bookmark" href="<?php echo esc_url($the_core_permalink); ?>">
	                                    <time itemprop="datePublished" datetime="<?php the_core_get_datetime_attribute(); ?>"><?php echo get_the_date(); ?></time>
	                                </a>
	                                <meta itemprop="dateModified" content="<?php the_core_get_modified_date_attribute(); ?>">
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
	                <?php if ( ( $post_categories != 'no' && $post_type != 'fw-learning-articles' ) && $post_type != 'lesson' ) : ?>
                        <span class="cat-links"> <?php esc_html_e( 'In', 'the-core' ); ?> <?php echo the_core_cat_links( $post_type, $post_id ); ?></span>
                    <?php endif; ?>
                </div>
            </footer>
        <?php else : ?>
            <div class="fw-post-empty-div"></div>
        <?php endif; ?>
	<?php }
endif;


if ( ! function_exists( 'the_core_get_socials' ) ) :
	/**
	 * Display socials buttons
	 *
	 * @param string $class
	 */
	function the_core_get_socials( $class ) {
		$socials = fw_get_db_settings_option( 'socials' );

		if ( ! empty( $socials ) ) {
			$socials_html = '';
			$i            = 0;
			// parse all socials
			foreach ( $socials as $social ) {
				$i++;
				$icon = '';
				if ( $social['social_type']['social-type'] == 'icon-social' ) {
					// get icon class
					if ( ! empty( $social['social_type']['icon-social']['icon_class'] ) ) {
						$icon .= '<i class="' . $social['social_type']['icon-social']['icon_class'] . '"></i>';
					}
				} else {
					// get uploaded icon
					if ( ! empty( $social['social_type']['upload-icon']['upload-social-icon'] ) ) {
						$icon .= '<img src="' . the_core_change_original_link_with_cdn( $social['social_type']['upload-icon']['upload-social-icon']['url'] ) . '" alt="" />';
					}
				}

				// get social link
				$link = esc_url( _filter_the_core_socials_wpml( $social['social-link'], $i ) );

				$socials_html .= '<a target="_blank" href="' . $link . '">' . $icon . '</a>';
			}

			// return socials html
			return '<div class="' . esc_attr($class) . '">' . $socials_html . '</div>';
		}
	}
endif;


if ( ! function_exists( 'the_core_get_content_class' ) ) :
	/**
	 * Get content class when is full width or width sidebar
	 *
	 * @param string $parameter
	 * @param string $the_core_sidebar_position
	 */
	function the_core_get_content_class( $parameter, $the_core_sidebar_position ) {
		$class = '';
		if ( $parameter == 'content' ) {
			if ( $the_core_sidebar_position == 'left' || $the_core_sidebar_position == 'right' ) {
				$class = 'col-md-8 col-sm-12';
			} else {
				$class = 'col-md-12';
			}
		} elseif ( $parameter == 'main' ) {
			if ( $the_core_sidebar_position == 'left' ) {
				$class = 'sidebar-left';
			} elseif ( $the_core_sidebar_position == 'right' ) {
				$class = 'sidebar-right';
			}
		}
		echo esc_attr($class);
	}
endif;


if ( ! function_exists( 'the_core_return_term_id' ) ) :
	/**
	 * return term id
	 *
	 * @param string $taxonomy
	 */
	function the_core_return_term_id( $taxonomy = '' ) {
		if ( $taxonomy == 'category' ) {
			$term = get_category( get_query_var( 'cat' ) );
		} else {
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		}

		if ( isset( $term->term_id ) ) {
			$ID = $term->term_id;
		} else {
			$ID = false;
		}

		return $ID;
	}
endif;


if ( ! function_exists( 'the_core_single_post_title' ) ) :
	/**
	 * Display single post/page title
	 *
	 * @param integer $post_id
	 * @param string $post_type
	 */
	function the_core_single_post_title( $post_id, $post_type = 'post' ) {
		if ( ! defined( 'FW' ) ) {
			if($post_type == 'fw-event'){
				echo '<h2 class="entry-title" itemprop="name">' . get_the_title() . '</h2>';
			}
			else{
				echo '<h2 class="entry-title" itemprop="headline">' . get_the_title() . '</h2>';
			}
			return;
		}
		elseif( function_exists('fw_ext_page_builder_is_builder_post') && fw_ext_page_builder_is_builder_post($post_id) && $post_type == 'fw-portfolio' ){
			return;
		}

		$overlay = '';
		$image   = fw_get_db_post_option( $post_id, 'header_image', array() );

		// get general header options
		if ( $post_type == 'page' ) {
			$general_header_options = fw_get_db_settings_option( 'general_page_header', '' );
		} elseif ( $post_type == 'fw-portfolio' ) {
			$general_header_options = fw_get_db_settings_option( 'general_portfolio_header', '' );
		} elseif ( $post_type == 'fw-event' ) {
			$general_header_options = fw_get_db_settings_option( 'general_events_header', '' );
		} elseif ( $post_type == 'fw-learning-articles' ) {
			$general_header_options = fw_get_db_settings_option( 'general_learning_header', '' );
		}elseif ( $post_type == 'course' || $post_type == 'lesson' ) {
			$general_header_options = fw_get_db_settings_option( 'general_courses_header', '' );
		} else {
			$general_header_options = fw_get_db_settings_option( 'general_posts_header', '' );
		}

		if ( $post_type == 'page' ) {
			// for default page template
			$posts_header_title = array();
			// return if the option display_page_title is set to "no"
			if ( 'no' == fw_get_db_post_option( $post_id, 'display_page_title/selected', 'yes' ) ) {
				return;
			}
		} else {
			$posts_header_title = isset( $general_header_options['posts_header_title'] ) ? $general_header_options['posts_header_title'] : array();
		}

		if ( isset( $general_header_options['posts_header_overlay_options']['posts_header_overlay'] ) && $general_header_options['posts_header_overlay_options']['posts_header_overlay'] == 'yes' ) {
			$overlay = $general_header_options['posts_header_overlay_options']['posts_header_overlay'];
		}

		if ( $image == '' ) {
			// if image from post or category is empty - get image from general theme settings
			$image = isset( $general_header_options['posts_header_image'] ) ? $general_header_options['posts_header_image'] : array();
		}

		if ( ( empty( $image ) && $overlay != 'yes' ) || ( isset( $posts_header_title['posts_title'] ) && $posts_header_title['posts_title'] != 'post_title' ) ) {
			$the_core_blog_title = fw_get_db_settings_option('posts_settings/blog_title/selected', 'h2');
			if($post_type == 'fw-event'){
				$itemprop = 'name';
			}
			else{
				$itemprop = 'headline';
			}
			?>
			<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="<?php echo esc_attr($itemprop); ?>"><?php the_title(); ?></<?php echo ($the_core_blog_title); ?>>
		<?php }
	}
endif;


if( ! function_exists( 'the_core_header_image' ) ) :
	/**
	 * Display header image for taxonomies and posts
	 */
	function the_core_header_image(){
		if (!defined('FW')) {
			return;
		}

		global $post;
		$post_type = get_post_type( $post );
		$category_options = array();

		if( is_search() ){
			// for search get options form general/posts
			$post_type = 'post';
		}

		// get general header options
		if( is_front_page() && ( get_option('show_on_front', 'posts') == 'posts' ) ) {
			// for homepage when is set "latest posts" on front page
			$general_header_options = fw_get_db_settings_option( 'general_homepage_header', '' );
		}
		elseif( function_exists('is_buddypress') && is_buddypress() ){
			// for buddypress pages
			$general_header_options = fw_get_db_settings_option( 'general_buddypress_header', '' );
		}
		elseif($post_type == 'page'){
			$general_header_options = fw_get_db_settings_option( 'general_page_header', '' );
		}
		elseif($post_type == 'fw-portfolio'){
			$general_header_options = fw_get_db_settings_option( 'general_portfolio_header', '' );
		}
		elseif($post_type == 'fw-event'){
			$general_header_options = fw_get_db_settings_option( 'general_events_header', '' );
		}
		elseif($post_type == 'fw-learning-articles' || $post_type == 'fw-learning-courses' || $post_type == 'fw-learning-quiz' ){
			$general_header_options = fw_get_db_settings_option( 'general_learning_header', '' );
		}
		elseif( $post_type == 'course' || $post_type == 'lesson' || $post_type == 'llms_quiz' || $post_type == 'llms_question' || $post_type == 'llms_membership' || $post_type == 'lp_course' ) {
			$general_header_options = fw_get_db_settings_option( 'general_courses_header', '' );
		}
		elseif($post_type == 'product'){
			$general_header_options = fw_get_db_settings_option( 'general_products_header', '' );
		}
		elseif($post_type == 'topic' || $post_type == 'forum'){
			$general_header_options = fw_get_db_settings_option( 'general_bbpress_header', '' );
		}
		else{
			$general_header_options = fw_get_db_settings_option( 'general_posts_header', '' );
		}

		$posts_header_height = $content_position_style = $description = $the_core_overlay_style = $title =  $taxonomy = $term_id = $header_image_overlap_style = $header_image_overlap_class = '';
		if( function_exists('is_buddypress') && is_buddypress() ) {
			// for buddypress pages
			$image = isset($general_header_options['posts_header_image']) ? $general_header_options['posts_header_image'] : array();

			// title and description
			$title = $description = '';
			if( isset($general_header_options['custom_title_text']) ){
				$title = $general_header_options['custom_title_text'];
				$description = $general_header_options['custom_subtitle_text'];
			}

			// overlay
			$posts_header_overlay_options = isset( $general_header_options['posts_header_overlay_options'] ) ? $general_header_options['posts_header_overlay_options'] : array();
			if ( isset( $posts_header_overlay_options['posts_header_overlay'] ) && $posts_header_overlay_options['posts_header_overlay'] == 'yes' ) {
				$the_core_overlay_bg = $posts_header_overlay_options['yes']['posts_header_overlay_color']['id'];
				$the_core_opacity    = $posts_header_overlay_options['yes']['posts_header_overlay_opacity_image'] / 100;
				if ( $the_core_overlay_bg == 'fw-custom' ) {
					if ( ! empty( $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] ) ) {
						$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
					}
				} else {
					$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_overlay_bg . '" style="opacity: ' . $the_core_opacity . ';"></div>';
				}
			}

			// header height and header content position
			$posts_header_height = isset($general_header_options['posts_header_height']) ? $general_header_options['posts_header_height'] : '';
			$posts_header_content_position = isset($general_header_options['posts_header_content_position']) ? $general_header_options['posts_header_content_position'] : '';
			$content_position_style = !empty($posts_header_content_position) ? 'style="top:'.$posts_header_content_position.'px;"' : '';
			if ( $posts_header_height != 'auto' && $posts_header_height != 'fw-section-height-sm' && $posts_header_height != 'fw-section-height-md' && $posts_header_height != 'fw-section-height-lg' ) {
				$header_image_overlap_style .= ' height: ' . (int) $posts_header_height . 'px;';
				$posts_header_height         = 'fw-section-height-custom';
			} else {
				$posts_header_height = $posts_header_height;
			}

			// header image overlap
			$header_image_overlap = isset($general_header_options['header_image_overlap']) ? $general_header_options['header_image_overlap'] : '';
		}
		elseif( is_page() ){
			// for page (default template)
			$post_id = $post->ID;
			$image   = fw_get_db_post_option($post_id, 'header_image', '');
			if($image == ''){
				// if image from page is empty - get image from general theme settings
				$image = isset($general_header_options['posts_header_image']) ? $general_header_options['posts_header_image'] : array();
			}
			$title   = get_the_title($post_id);

			// overlay
			$posts_header_overlay_options = isset( $general_header_options['posts_header_overlay_options'] ) ? $general_header_options['posts_header_overlay_options'] : array();
			if ( isset( $posts_header_overlay_options['posts_header_overlay'] ) && $posts_header_overlay_options['posts_header_overlay'] == 'yes' ) {
				$the_core_overlay_bg = $posts_header_overlay_options['yes']['posts_header_overlay_color']['id'];
				$the_core_opacity    = $posts_header_overlay_options['yes']['posts_header_overlay_opacity_image'] / 100;
				if ( $the_core_overlay_bg == 'fw-custom' ) {
					if ( ! empty( $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] ) ) {
						$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
					}
				} else {
					$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_overlay_bg . '" style="opacity: ' . $the_core_opacity . ';"></div>';
				}
		}

			// header height and header content position
			$posts_header_height = isset($general_header_options['posts_header_height']) ? $general_header_options['posts_header_height'] : '';
			$posts_header_content_position = isset($general_header_options['posts_header_content_position']) ? $general_header_options['posts_header_content_position'] : '';
			$content_position_style = !empty($posts_header_content_position) ? 'style="top:'.$posts_header_content_position.'px;"' : '';
			if ( $posts_header_height != 'auto' && $posts_header_height != 'fw-section-height-sm' && $posts_header_height != 'fw-section-height-md' && $posts_header_height != 'fw-section-height-lg' ) {
				$header_image_overlap_style .= ' height: ' . (int) $posts_header_height . 'px;';
				$posts_header_height         = 'fw-section-height-custom';
			} else {
				$posts_header_height = $posts_header_height;
			}

			// header image overlap
			$header_image_overlap = isset($general_header_options['header_image_overlap']) ? $general_header_options['header_image_overlap'] : '';
		}
		elseif( !is_single() ) {
			$archive   = false;
			$post_type = ''; // make post_type empty for categories because is used in section as class
			if( is_category() ){
				$term = get_category( get_query_var('cat'), false );
			}
			else{
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			}

			if( isset($term->taxonomy) ){
				$taxonomy = $term->taxonomy;
				$term_id = $term->term_id;
				$title = $term->name;
				$description = $term->description;
			}
			else{
				$archive = true;
				if( is_post_type_archive('product')){
					$title = esc_html__('Products', 'the-core');
				}
				elseif( is_search() ){
					$title = esc_html__( 'Search results', 'the-core' );
				}
				else{
					$title = the_core_get_the_archive_title();
					// for blog page
					if ( is_home() && !is_front_page() ) {
						$page_for_posts = get_option( 'page_for_posts' );
						$title          = get_the_title( $page_for_posts );
					}
				}
			}

			// category options
			$category_options = fw_get_db_term_option($term_id, $taxonomy, '', '');
			if(isset($category_options['category_header_title']['category_title']) && $category_options['category_header_title']['category_title'] == 'custom_title'){
				$title = $category_options['category_header_title']['custom_title']['custom_title_text'];
			}

			// header_image from category
			$image = '';
			if( !empty($category_options) ) {
				if( isset($category_options['header_image']) ) {
					$image = $category_options['header_image'];
				}

				$posts_header_height = isset($category_options['posts_header_height']) ? $category_options['posts_header_height'] : '';
				$posts_header_content_position = isset($category_options['posts_header_content_position']) ? $category_options['posts_header_content_position'] : '';
				$content_position_style = !empty($posts_header_content_position) ? 'style="top:'.$posts_header_content_position.'px;"' : '';
				if ( $posts_header_height != 'auto' && $posts_header_height != 'fw-section-height-sm' && $posts_header_height != 'fw-section-height-md' && $posts_header_height != 'fw-section-height-lg' ) {
					$header_image_overlap_style .= ' height: ' . (int) $posts_header_height . 'px;';
					$posts_header_height         = 'fw-section-height-custom';
				} else {
					$posts_header_height = $posts_header_height;
				}

				// category overlay
				$posts_header_overlay_options = isset($category_options['category_header_overlay_options']) ? $category_options['category_header_overlay_options'] : array();
				if(isset($posts_header_overlay_options['category_header_overlay']) && $posts_header_overlay_options['category_header_overlay'] == 'yes'){
					$the_core_overlay_bg = $posts_header_overlay_options['yes']['category_header_overlay_color']['id'];
					$the_core_opacity = $posts_header_overlay_options['yes']['category_header_overlay_opacity_image']/100;
					if($the_core_overlay_bg == 'fw-custom'){
						if(!empty($posts_header_overlay_options['yes']['category_header_overlay_color']['color'])){
							$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: '.$posts_header_overlay_options['yes']['category_header_overlay_color']['color'].'; opacity: '.$the_core_opacity.';"></div>';
						}
					}
					else{
						$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_'.$the_core_overlay_bg.'" style="opacity: '.$the_core_opacity.';"></div>';
					}
				}

				// header image overlap
				$header_image_overlap = isset($category_options['header_image_overlap']) ? $category_options['header_image_overlap'] : '';
			}
			else{
				// header height and header content position
				$posts_header_height = isset($general_header_options['posts_header_height']) ? $general_header_options['posts_header_height'] : '';
				$posts_header_content_position = isset($general_header_options['posts_header_content_position']) ? $general_header_options['posts_header_content_position'] : '';
				$content_position_style = !empty($posts_header_content_position) ? 'style="top:'.$posts_header_content_position.'px;"' : '';
				if ( $posts_header_height != 'auto' && $posts_header_height != 'fw-section-height-sm' && $posts_header_height != 'fw-section-height-md' && $posts_header_height != 'fw-section-height-lg' ) {
					$header_image_overlap_style .= ' height: ' . (int) $posts_header_height . 'px;';
					$posts_header_height         = 'fw-section-height-custom';
				} else {
					$posts_header_height = $posts_header_height;
				}

				// overlay
				$posts_header_overlay_options = isset( $general_header_options['posts_header_overlay_options'] ) ? $general_header_options['posts_header_overlay_options'] : array();
				if ( isset( $posts_header_overlay_options['posts_header_overlay'] ) && $posts_header_overlay_options['posts_header_overlay'] == 'yes' ) {
					$the_core_overlay_bg = $posts_header_overlay_options['yes']['posts_header_overlay_color']['id'];
					$the_core_opacity    = $posts_header_overlay_options['yes']['posts_header_overlay_opacity_image'] / 100;
					if ( $the_core_overlay_bg == 'fw-custom' ) {
						if ( ! empty( $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] ) ) {
							$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
						}
					} else {
						$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_overlay_bg . '" style="opacity: ' . $the_core_opacity . ';"></div>';
					}
				}

				// header image overlap
				$header_image_overlap = isset($general_header_options['header_image_overlap']) ? $general_header_options['header_image_overlap'] : '';
			}

			if( is_post_type_archive('product') ){
				// if is product archive page
				$shop_page_id = get_option( 'woocommerce_shop_page_id' );
				$image = fw_get_db_post_option($shop_page_id, 'header_image', '');
				$title = get_the_title($shop_page_id);
			}
			elseif( $archive ){
				// if is archive
				$post_type = get_post_type( $post );
				$image = isset($general_header_options['posts_header_image']) ? $general_header_options['posts_header_image'] : array();
				if( is_search() ){
					// for search get options form general/posts
					$post_type = 'post';
				}

				// for forum archive
				if( $post_type == 'forum' ) {
					// for bbpress topic and forum
					$title = $description = '';
					if( isset($general_header_options['custom_title_text']) ){
						$title = $general_header_options['custom_title_text'];
						$description = $general_header_options['custom_subtitle_text'];
					}
				}

				// home page with latest posts
				if( is_front_page() ) {
					$title = $general_header_options['custom_title_text'];
					$description = $general_header_options['custom_subtitle_text'];
				}
				elseif ( is_home() ) {
					// blog page
					$page_for_posts = get_option( 'page_for_posts' );
					$image = fw_get_db_post_option($page_for_posts, 'header_image', '');
				}
			}
		}
		else{
			// for single post
			$post_id       = $post->ID;
			$image         = fw_get_db_post_option($post_id, 'header_image', '');
			if($image == ''){
				// if image from post is empty - get image from general theme settings
				$image = isset($general_header_options['posts_header_image']) ? $general_header_options['posts_header_image'] : array();
			}
			$taxonomy_list = get_object_taxonomies($post_type);
			if( isset($taxonomy_list['0']) ){
				$taxonomy = $taxonomy_list['0'];
				if( $taxonomy == 'product_type' ){
					// product taxonomy
					$taxonomy = 'product_cat';
				}
				elseif( $taxonomy == 'course_type' ){
					// course taxonomy
					$taxonomy = 'course_cat';
				}
			}
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			/* this will be deleted, if no setttings in general settings the posts is without header image, this is the right solution */
			/*if($image == ''){
				// get image from post category
				if(isset($terms[0]->term_id)){
					$image = fw_get_db_term_option($terms[0]->term_id, $taxonomy, 'header_image', '');
				}
			}*/

			// general post header title
			$posts_header_title = isset($general_header_options['posts_header_title']) ? $general_header_options['posts_header_title'] : array();

			if( $post_type == 'topic' || $post_type == 'forum' ){
				// for bbpress topic and forum
				$title = $description = '';
				if( isset($general_header_options['custom_title_text']) ){
					$title = $general_header_options['custom_title_text'];
					$description = $general_header_options['custom_subtitle_text'];
				}
			}
			elseif(isset($posts_header_title['posts_title']) && $posts_header_title['posts_title'] == 'custom_title'){
				$title = $posts_header_title['custom_title']['custom_title_text'];
				$description = $posts_header_title['custom_title']['custom_subtitle_text'];
			}
			elseif(isset($posts_header_title['posts_title']) && $posts_header_title['posts_title'] == 'category_title'){
				if(isset($terms[0]->name)){
					$title = $terms[0]->name;
					$description = $terms[0]->description;
				}

				if( $post_type == 'fw-learning-articles' || $post_type == 'fw-learning-quiz' || $post_type == 'lesson' || $post_type == 'llms_quiz' || $post_type == 'llms_quiz' || $post_type == 'llms_question' ){
					// for learning article (don't have category)
					$title = get_the_title($post_id);
				}
			}
			else{
				$title = get_the_title($post_id);
			}

			// header height and header content position
			$posts_header_height = isset($general_header_options['posts_header_height']) ? $general_header_options['posts_header_height'] : '';
			$posts_header_content_position = isset($general_header_options['posts_header_content_position']) ? $general_header_options['posts_header_content_position'] : '';
			$content_position_style = !empty($posts_header_content_position) ? 'style="top:'.$posts_header_content_position.'px;"' : '';

			if ( !empty( $posts_header_height ) && $posts_header_height != 'auto' && $posts_header_height != 'fw-section-height-sm' && $posts_header_height != 'fw-section-height-md' && $posts_header_height != 'fw-section-height-lg' ) {
				$header_image_overlap_style .= ' height: ' . (int) $posts_header_height . 'px;';
				$posts_header_height         = 'fw-section-height-custom';
			} else {
				$posts_header_height = $posts_header_height;
			}

			// header image overlap
			$header_image_overlap = isset($general_header_options['header_image_overlap']) ? $general_header_options['header_image_overlap'] : '';

			// overlay
			$posts_header_overlay_options = isset( $general_header_options['posts_header_overlay_options'] ) ? $general_header_options['posts_header_overlay_options'] : array();
			if ( isset( $posts_header_overlay_options['posts_header_overlay'] ) && $posts_header_overlay_options['posts_header_overlay'] == 'yes' ) {
				$the_core_overlay_bg = $posts_header_overlay_options['yes']['posts_header_overlay_color']['id'];
				$the_core_opacity    = $posts_header_overlay_options['yes']['posts_header_overlay_opacity_image'] / 100;
				if ( $the_core_overlay_bg == 'fw-custom' ) {
					if ( ! empty( $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] ) ) {
						$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $posts_header_overlay_options['yes']['posts_header_overlay_color']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
					}
				} else {
					$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_overlay_bg . '" style="opacity: ' . $the_core_opacity . ';"></div>';
				}
			}
		}

		// header image overlap
		if( !empty($header_image_overlap) && $header_image_overlap != 'fw-content-overlay-sm' && $header_image_overlap != 'fw-content-overlay-md' && $header_image_overlap != 'fw-content-overlay-lg' ){
			$header_image_overlap_style .= ' margin-bottom:' . - (int)$header_image_overlap . 'px;';
			$header_image_overlap_class = 'fw-content-overlay-custom';
		}
		else{
			$header_image_overlap_class = $header_image_overlap;
		}

		// header image title alignment
		$heading_alignment = 'fw-heading-center';
		if( !empty($category_options) && isset($category_options['category_title_alignment']) ) {
			$heading_alignment = $category_options['category_title_alignment'];
		}
		elseif( isset($general_header_options['post_title_alignment']) && !empty($general_header_options['post_title_alignment']) ) {
			$heading_alignment = $general_header_options['post_title_alignment'];
		}

		// filter for header image variables
		$post_id = isset($post->ID) ? $post->ID : '';
		$the_core_header_image_variables = apply_filters( '_the_core_filter_header_image_variables',
			array(
				'header_image_overlap_class' => $header_image_overlap_class,
				'posts_header_height'        => $posts_header_height,
				'header_image_custom_class'  => '',
				'header_image_overlap_style' => $header_image_overlap_style,
				'the_core_overlay_style'     => $the_core_overlay_style,
				'content_position_style'     => $content_position_style,
				'heading_alignment'          => $heading_alignment,
				'title'                      => $title,
				'description'                => $description
			),
			$post_id,
			$post_type
		);

		if(!empty($image) || (isset($posts_header_overlay_options['posts_header_overlay']) && $posts_header_overlay_options['posts_header_overlay'] =='yes') || (isset($posts_header_overlay_options['category_header_overlay']) && $posts_header_overlay_options['category_header_overlay'] =='yes') ){ ?>
			<section class="fw-main-row-custom <?php echo esc_attr($the_core_header_image_variables['header_image_overlap_class']); ?> fw-main-row-top fw-content-vertical-align-middle <?php echo esc_attr($the_core_header_image_variables['posts_header_height']); ?> fw-section-image fw-section-default-page <?php echo esc_attr($post_type); ?> <?php echo esc_attr($the_core_header_image_variables['header_image_custom_class']); ?>" style="background-image: url('<?php if( !empty( $image ) ) echo esc_url( $image['url'] ); ?>'); <?php echo ($the_core_header_image_variables['header_image_overlap_style']); ?>">
				<?php echo ($the_core_header_image_variables['the_core_overlay_style']); ?>
				<div class="fw-container">
					<div class="fw-row">
						<div class="fw-col-sm-12" <?php echo ($the_core_header_image_variables['content_position_style']); ?>>
							<div class="fw-heading <?php echo esc_attr($the_core_header_image_variables['heading_alignment']); ?>">
								<h1 class="fw-special-title"><?php echo the_core_translate($the_core_header_image_variables['title']); ?></h1>
								<?php if( $the_core_header_image_variables['description'] != '' ) : ?>
									<div class="fw-special-subtitle"><?php echo the_core_translate($the_core_header_image_variables['description']); ?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		else{ ?>
			<div class="no-header-image"></div>
		<?php }
	}
endif;


if( ! function_exists( 'the_core_single_post_options' ) ) :
	/**
	 * return single post options
	 *
	 * @param integer $post_id
	 */
	function the_core_single_post_options($post_id) {
		$featured_image = 'yes';
		$frame = '';

		if ( defined( 'FW' ) ) {
			$posts_general_settings = fw_get_db_settings_option( 'posts_settings', '' );
			$frame                  = isset( $posts_general_settings['add_image_border']['selected'] ) ? $posts_general_settings['add_image_border']['selected'] : '';

			$single_post_options = fw_get_db_post_option($post_id, 'post_settings');
			$featured_image = isset($single_post_options['featured_image']) ? $single_post_options['featured_image'] : 'yes';
		}

		$image_ratio = isset($single_post_options['ratio']) ? $single_post_options['ratio'] : '';
		$args = array(
			'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
			'size'     => 'fw-theme-blog-full',
			'return'   => true,
			'ratio'    => $image_ratio
		);
		$image       = the_core_image( get_post_thumbnail_id(), $args );
		$ratio_class = $image['ratio'];

		return array(
			'image' => $image,
			'ratio_class' => $ratio_class,
			'frame' => $frame,
			'featured_image' => $featured_image,
		);
	}
endif;


if( ! function_exists( 'the_core_listing_post_options' ) ) :
	/**
	 * return listing post options
	 *
	 * @param integer $post_id
	 */
	function the_core_listing_post_options($post_id) {
		$image_alignment = $rounded = $frame = $image_ratio = '';

		if ( defined( 'FW' ) ) {
			$post_settings          = fw_get_db_post_option( $post_id, 'post_settings' );
			$image_alignment        = isset($post_settings['image_alignment']) ? $post_settings['image_alignment'] : fw_get_db_settings_option( 'posts_settings/image_alignment', '' );
			$image_ratio            = isset($post_settings['ratio']) ? $post_settings['ratio'] : '';
			$rounded                = isset($post_settings['rounded']) ? $post_settings['rounded'] : '';
			$posts_general_settings = fw_get_db_settings_option( 'posts_settings', '' );
			$frame                  = isset( $posts_general_settings['add_image_border']['selected'] ) ? $posts_general_settings['add_image_border']['selected'] : '';
		}

		$ratio       = ($rounded == 'fw-block-image-circle' ) ? 'fw-ratio-1' : $image_ratio;
		$args        = array(
			'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
			'size'     => 'fw-theme-blog-full',
			'return'   => true,
			'ratio'    => $ratio
		);
		$image       = the_core_image( get_post_thumbnail_id(), $args );
		$ratio_class = ( !empty($image_ratio) && $image_ratio != 'fw-original-ratio' ) ? $image_ratio.' fw-ratio-container' : $image['ratio'];

		if ( $rounded == 'fw-block-image-circle' ) {
			$ratio_class = 'fw-ratio-1 fw-ratio-container';
		}

		if( !$image ){
			$frame = '';
		}
		return array(
			'image' => $image,
			'rounded' => $rounded,
			'image_alignment' => $image_alignment,
			'ratio_class' => $ratio_class,
			'frame' => $frame,
		);
	}
endif;


if( ! function_exists( 'the_core_general_posts_options' ) ) :
	/**
	 * return theme general posts options
	 */
	function the_core_general_posts_options() {
		if ( defined( 'FW' ) ) {
			return array(
				'blog_view'         => fw_get_db_settings_option( 'posts_settings/blog_view', '' ),
				'blog_type'         => fw_get_db_settings_option( 'posts_settings/blog_type', 'blog-1' ),
				'first_letter_caps' => fw_get_db_settings_option( 'posts_settings/first_letter_caps', 'fw-letter-no-caps' ),
				'posts_per_page'    => get_option( 'posts_per_page', 10 ),
			);
		}
		else{
			return array(
				'blog_view'         => '',
				'blog_type'         => 'blog-1',
				'first_letter_caps' => 'fw-letter-no-caps',
				'posts_per_page'    => get_option( 'posts_per_page', 10 ),
			);
		}
	}
endif;


if ( ! function_exists( 'the_core_get_all_portfolio_taxonomy_list' ) ) :
	/**
	 * Get list of portfolio taxonomies
	 *
	 * @param string $param
	 */
	function the_core_get_all_portfolio_taxonomy_list( $param = 'All Categories' ) {
		$taxonomy = 'fw-portfolio-category';
		$args     = array(
			'hide_empty' => true,
		);

		$terms     = get_terms( $taxonomy, $args );
		$result    = array();
		$result[0] = $param;

		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				if( isset($term->term_id) ) {
					$result[ $term->term_id ] = $term->name;
				}
			}
		}

		return $result;
	}
endif;


if ( ! function_exists( 'the_core_button_class' ) ) :
	/**
	 * Display specific class for buttons - depends on theme
	 *
	 * @param string $style
	 */
	function the_core_button_class( $style ) {
		if ( $style == 'fw-btn-1' ) {
			echo 'fw-btn-1';
		} elseif ( $style == 'fw-btn-2' ) {
			echo 'fw-btn-2';
		} elseif ( $style == 'fw-btn-4' ) {
			echo 'fw-btn-4';
		} elseif ( $style == 'more' ) {
			echo 'fw-btn-post-read-more';
		} elseif ( $style == 'load-more-portfolio' ) {
			echo 'fw-btn fw-btn-3 fw-btn-md';
		} elseif ( $style == 'send_contact' ) {
			echo 'fw-btn-form';
		} elseif ( $style == 'join-discussion' ) {
			echo 'fw-btn fw-btn-3 fw-btn-md fw-join-discussion';
		} elseif ( $style == 'fw-btn-instagram' ) {
			echo 'fw-btn-instagram fw-btn fw-btn-1 fw-btn-sm';
		} else {
			echo 'fw-btn-3';
		}
	}
endif;


if ( ! function_exists( 'the_core_get_datetime_attribute' ) ) :
	/**
	 * Display specific date format for datetime attribute
	 *
	 * @param boolean $return
	 */
	function the_core_get_datetime_attribute( $return = false ) {
		$date      = get_the_date( 'Y-m-d---G:i:sP' );
		$date_time = str_replace( '---', 'T', $date );
		if ( $return ) {
			return $date_time;
		} else {
			echo esc_attr($date_time);
		}
	}
endif;


if ( ! function_exists( 'the_core_get_modified_date_attribute' ) ) :
	/**
	 * Display specific date format for datetime attribute
	 *
	 * @param boolean $return
	 */
	function the_core_get_modified_date_attribute( $return = false ) {
		$date      = get_the_modified_date( 'Y-m-d---G:i:sP' );
		$date_time = str_replace( '---', 'T', $date );
		if ( $return ) {
			return $date_time;
		} else {
			echo esc_attr($date_time);
		}
	}
endif;


if ( ! function_exists( 'the_core_cat_links' ) ):
	/**
	 * Return list of categories
	 *
	 * @param string $post_type
	 * @param integer $id
	 */
	function the_core_cat_links( $post_type, $id ) {
		if ( $post_type == 'fw-event' ) {
			return get_the_term_list( $id, 'fw-event-taxonomy-name', '', ', ' );
		} if ( $post_type == 'course' ) {
			if( ! is_wp_error( get_the_term_list( $id, 'course_cat', '', ', ' ) ) ) {
				return get_the_term_list( $id, 'course_cat', '', ', ' );
			}
			if( ! is_wp_error( get_the_term_list( $id, 'course-category', '', ', ' ) ) ) {
				return get_the_term_list( $id, 'course-category', '', ', ' );
			}
		} else {
			return get_the_term_list( $id, 'category', '', ', ', '' );
		}
	}
endif;


if ( ! function_exists( 'the_core_get_category_term_list' ) ) :
	/**
	 * Return array of categories
	 */
	function the_core_get_category_term_list() {
		$taxonomy = 'category';
		$args     = array(
			'hide_empty' => true,
		);

		$terms     = get_terms( $taxonomy, $args );
		$result    = array();
		$result[0] = esc_html__( 'All Categories', 'the-core' );

		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$result[ $term->term_id ] = $term->name;
			}
		}

		return $result;
	}
endif;


if ( ! function_exists( 'the_core_header_search' ) ) :
	/**
	 * Display header search
	 *
	 * @param array $atts
	 */
	function the_core_header_search( $atts = array('search_type' => 'fw-input-search', 'placeholder_text'=> '') ) { ?>
		<div class="fw-search <?php echo esc_attr($atts['search_type']); ?>">
			<?php if($atts['search_type'] == 'fw-input-search' ) : ?>
				<div class="fw-wrap-search-form" role="search">
					<form class="fw-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="text" name="s" class="fw-input-search" placeholder="<?php echo esc_attr($atts['placeholder_text']); ?>">

						<div class="fw-submit-wrap">
							<input type="submit" value="">
						</div>
					</form>
				</div>
			<?php endif; ?>
			<a href="#" class="fw-search-icon"><i class="fa fa-search"></i></a>
		</div>
	<?php }
endif;


if ( ! function_exists( 'the_core_header_mini_search' ) ) :
	/**
	 * Display header mini search
	 *
	 * @param string $the_core_placeholder_text
	 */
	function the_core_header_mini_search($the_core_placeholder_text) { ?>
		<div class="fw-wrap-search-form fw-form-search-full" role="search">
			<form class="fw-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" name="s" class="fw-input-search" placeholder="<?php echo esc_attr($the_core_placeholder_text); ?>">
				<div class="fw-submit-wrap"></div>
			</form>
		</div>
	<?php }
endif;


if ( ! function_exists( 'the_core_header' ) ) :
	/**
	 * Display theme header
	 */
	function the_core_header() {
		$the_core_header_settings = defined( 'FW' ) ? fw_get_db_settings_option( 'header_settings' ) : array();
		$the_core_header_type = isset( $the_core_header_settings['header_type_picker']['header_type'] ) ? $the_core_header_settings['header_type_picker']['header_type'] : 'header-1';

		get_template_part( 'templates/headers/'.$the_core_header_type);
	}
endif;


if ( ! function_exists( 'the_core_footer' ) ) :
	/**
	 * Display theme footer
	 */
	function the_core_footer() {
		$the_core_footer_settings     = defined( 'FW' ) ? fw_get_db_settings_option( 'footer_settings' ) : array();
		$themefuse_link      = 'https://themefuse.com/';
		$show_footer_widgets = isset( $the_core_footer_settings['show_footer_widgets']['selected_value'] ) ? $the_core_footer_settings['show_footer_widgets']['selected_value'] : 'yes';
		$show_menu_bar       = isset( $the_core_footer_settings['show_menu_bar']['selected_value'] ) ? $the_core_footer_settings['show_menu_bar']['selected_value'] : 'yes';
		$copyright_position  = isset( $the_core_footer_settings['copyright_position'] ) ? $the_core_footer_settings['copyright_position'] : 'fw-copyright-center';
		$footer_socials      = isset( $the_core_footer_settings['footer_socials']['selected_value'] ) ? $the_core_footer_settings['footer_socials']['selected_value'] : 'no';
		$copyright           = isset( $the_core_footer_settings['copyright'] ) ? $the_core_footer_settings['copyright'] : 'Copyright &copy;2018 <a href="'.$themefuse_link.'" rel="nofollow">ThemeFuse</a>. All Rights Reserved';
		?>
		<?php if ( $show_footer_widgets == 'yes' ) :
			get_template_part( 'templates/footers/footer-widgets' );
		endif; ?>

		<?php if ( $show_menu_bar == 'yes' ) :
			get_template_part( 'templates/footers/footer-menu' );
		endif; ?>

		<div class="fw-footer-bar <?php echo esc_attr($copyright_position); ?>">
			<div class="fw-container">
				<?php if ( $footer_socials == 'yes' ) {
					echo the_core_get_socials( 'fw-footer-social' );
				} ?>
				<?php // fix polylang translations problem on the server using "pll__" function ?>
				<div class="fw-copyright"><?php echo function_exists('pll__') ? pll__($copyright) : the_core_translate($copyright); ?></div>
			</div>
		</div>
	<?php }
endif;


if ( ! function_exists( 'the_core_get_blog_view' ) ) :
	/**
	 * Get blog view classes and id
	 *
	 * @param string $the_core_blog_view
	 * @param string $selector
	 * @param string $the_core_sidebar_position
	 */
	function the_core_get_blog_view( $the_core_blog_view, $selector = 'class', $the_core_sidebar_position = null ) {
		if ( $the_core_blog_view == 'grid' ) {
			if ( $selector == 'id' ) {
				return ( $the_core_sidebar_position == null || $the_core_sidebar_position == 'full' ) ? 'id="postlist-grid3"' : 'id="postlist-grid2"';
			} else {
				return ( $the_core_sidebar_position == null || $the_core_sidebar_position == 'full' ) ? 'clearfix fw-row postlist-grid postlist-grid-cols3' : 'clearfix fw-row postlist-grid postlist-grid-cols2';
			}
		}

		return '';
	}
endif;


if ( ! function_exists( 'the_core_get_blog_wrap' ) ) :
	/**
	 * Get blog wrap
	 *
	 * @param string $the_core_blog_view
	 * @param string $the_core_sidebar_position
	 */
	function the_core_get_blog_wrap( $the_core_blog_view, $the_core_sidebar_position = null, $the_core_blog_cols = '' ) {
		$the_core_wrap_div = array();

		if ( $the_core_blog_view == 'grid' ) {
			if ( $the_core_blog_cols != '' ) {
				if( 'fw-portfolio-cols-2' == $the_core_blog_cols ) {
					$the_core_wrap_div['start'] = '<div class="fw-col-md-6 fw-col-sm-6 postlist-col">';
				}
				elseif( 'fw-portfolio-cols-4' == $the_core_blog_cols ) {
					$the_core_wrap_div['start'] = '<div class="fw-col-md-3 fw-col-sm-6 postlist-col">';
				}
				else {
					$the_core_wrap_div['start'] = '<div class="fw-col-md-4 fw-col-sm-6 postlist-col">';
				}
				$the_core_wrap_div['end']   = '</div>';
			}
			else {
				$the_core_wrap_div['start'] = ( $the_core_sidebar_position == null || $the_core_sidebar_position == 'full' ) ? '<div class="fw-col-md-4 fw-col-sm-6 postlist-col">' : '<div class="fw-col-md-6 fw-col-sm-6 postlist-col">';
				$the_core_wrap_div['end']   = '</div>';
			}
		} else {
			$the_core_wrap_div['start'] = '';
			$the_core_wrap_div['end']   = '';
		}

		return $the_core_wrap_div;
	}
endif;


if ( ! function_exists( 'the_core_get_instagram_photos' ) ):
	/**
	 * Get instagram photos
	 *
	 * @param string $username - instagram username
	 * @param integer $items - number of photos
	 */
	function the_core_get_instagram_photos( $username, $items = 9 ) {
		if ( false === ( $instagram = get_transient( 'instagram-photos-' . sanitize_title_with_dashes( $username ) . '-'.$items ) ) ) {
			$connect = wp_remote_get( 'https://instagram.com/' . trim( $username ) );

			if ( is_wp_error( $connect ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'the-core' ) );
			}

			if ( 200 != wp_remote_retrieve_response_code( $connect ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'the-core' ) );
			}

			$shared_data     = explode( 'window._sharedData = ', $connect['body'] );
			$instagram_json  = explode( ';</script>', $shared_data[1] );
			$instagram_array = json_decode( $instagram_json[0], true );

			if ( ! $instagram_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'the-core' ) );
			}

			// attention on this array !
			if ( isset( $instagram_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$images = $instagram_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			}
			else{
				return;
			}

			$instagram = array();
			$the_core_count     = 0;
			foreach ( $images as $image ) {
				$instagram[] = array(
					'code'  => $image['node']['shortcode'],
					'link'  => $image['node']['thumbnail_src'],
					'likes' => $image['node']['edge_liked_by']['count'],
				);
				$the_core_count ++;
				if ( $the_core_count == $items ) {
					break;
				}
			}

			$instagram = serialize( $instagram );
			set_transient( 'instagram-photos-' . sanitize_title_with_dashes( $username ) . '-'.$items, $instagram, apply_filters( 'null_instagram_cache_time', 60 * 60 * 2 ) );
		}
		$instagram = unserialize( $instagram );

		return array_slice( $instagram, 0, $items );
	}
endif;


if ( ! function_exists( 'the_core_translate' ) ) :
	/**
	 * Return the content for translations plugins
	 *
	 * @param string $content
	 */
	function the_core_translate( $content ) {
		$content = html_entity_decode( $content, ENT_QUOTES, 'UTF-8' );

		if ( function_exists( 'icl_object_id' ) && strpos( $content, 'wpml_translate' ) == true ) {
			$content = do_shortcode( $content );
		} elseif ( function_exists( 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage' ) ) {
			$content = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage( $content );
		} elseif ( function_exists('ppqtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage' ) ) {
			$content = ppqtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($content);
		} elseif ( function_exists('pll__' ) ) {
			$content = pll__($content);
		}

		return $content;
	}
endif;


if ( ! function_exists( 'the_core_twitter_formating' ) ) :
	/**
	 * Return the twitter formatted text
	 *
	 * @param string $text
	 * @param string $user
	 */
	function the_core_twitter_formating( $text, $user ) {
		// The Regular Expression filter
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

		if( preg_match($reg_exUrl, $text, $url) ) {
			return preg_replace($reg_exUrl, '<a target="_blank" href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text);
		}
		else {
			return $text;
		}
	}
endif;


if ( ! function_exists( 'the_core_fade_slider_effects' ) ) :
	/**
	 * Return fade slider effects for title, description, button
	 */
	function the_core_fade_slider_effects() {
		return array(
			'title'       => array(
				'data-animate-in'  => 'fadeInDown',
				'data-animate-out' => 'fadeOutUp',
			),
			'description' => array(
				'data-animate-in'  => 'fadeInUp',
				'data-animate-out' => 'fadeOutDown',
			),
			'button'      => array(
				'data-animate-in'  => 'fadeInUp',
				'data-animate-out' => 'fadeOutDown',
			),
		);
	}
endif;


if ( ! function_exists( 'the_core_image_video_slider_effects' ) ) :
	/**
	 * Return effects for title, description, button
	 * pull-left is text position left, and pull-right for text position right
	 */
	function the_core_image_video_slider_effects() {
		return array(
			'pull-left'  => array(
				'image-video' => array(
					'data-animate-in'  => 'fadeInLeft',
					'data-animate-out' => 'fadeOutLeft',
				),
				'title'       => array(
					'data-animate-in'  => 'fadeInDown',
					'data-animate-out' => 'fadeOutUp',
				),
				'subtitle'    => array(
					'data-animate-in'  => 'fadeInDown',
					'data-animate-out' => 'fadeOutUp',
				),
				'description' => array(
					'data-animate-in'  => 'fadeInDown',
					'data-animate-out' => 'fadeOutUp',
				),
				'button'      => array(
					'data-animate-in'  => 'fadeInUp',
					'data-animate-out' => 'fadeOutDown',
				),
			),
			'pull-right' => array(
				'image-video' => array(
					'data-animate-in'  => 'fadeInRight',
					'data-animate-out' => 'fadeOutRight',
				),
				'title'       => array(
					'data-animate-in'  => 'fadeInDown',
					'data-animate-out' => 'fadeOutUp',
				),
				'subtitle'    => array(
					'data-animate-in'  => 'fadeInDown',
					'data-animate-out' => 'fadeOutUp',
				),
				'description' => array(
					'data-animate-in'  => 'fadeInDown',
					'data-animate-out' => 'fadeOutUp',
				),
				'button'      => array(
					'data-animate-in'  => 'fadeInUp',
					'data-animate-out' => 'fadeOutDown',
				),
			),
		);
	}
endif;


if ( ! function_exists( 'the_core_related_articles' ) ) :
	/**
	 * Return post related articles
	 */
	function the_core_related_articles() {
		global $post;
		$taxonomy   = 'post_tag';
		$post_terms = array();
		$terms      = wp_get_post_terms( $post->ID, $taxonomy );
		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$post_terms[] = $term->term_id;
			}
		} else {
			// if post have 0 tags
			$taxonomy = 'category';
			$terms    = wp_get_post_terms( $post->ID, $taxonomy );
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$post_terms[] = $term->term_id;
				}
			}
		}

        $sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
        $posts_per_page   = ( $sidebar_position == 'right' || $sidebar_position == 'left' ) ? 2 : 3;
		$args = array(
			'posts_per_page' => $posts_per_page,
			'orderby'        => 'date',
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'post__not_in'   => array( $post->ID ),
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'id',
					'terms'    => $post_terms
				),
			)
		);

		$all_posts = new WP_Query( $args );

		return $all_posts->posts;
	}
endif;


if ( ! function_exists( 'the_core_include_file_from_child' ) ) :
	/**
	 * Include a file first from child if exist else from parent
	 * a file from url (example url/logo.png)
	 */
	function the_core_include_file_from_child( $file ) {
		if ( file_exists( get_stylesheet_directory() . $file ) ) {
			return get_stylesheet_directory_uri() . $file;
		} else {
			return get_template_directory_uri() . $file;
		}
	}
endif;


if ( ! function_exists( 'the_core_get_font_array' ) ) :
	/**
	 * get an array of fonts
	 *
	 * @param array $font_array
	 * @param array $the_core_color_settings
	 */
	function the_core_get_font_array( $font_array, $the_core_color_settings ) {
		global $google_fonts_list;
		$return['font-family'] = "'".$font_array['family']."'";
		$return['font-size'] = $font_array['size'].'px';
		$return['line-height'] = $font_array['line-height'].'px';
		$return['letter-spacing'] = $font_array['letter-spacing'].'px';
		$return['color'] = '';
		if( isset($font_array['color-palette']['id']) && $font_array['color-palette']['id'] == 'fw-custom'){
			if( !empty($font_array['color-palette']['color']) ){
				$return['color'] = $font_array['color-palette']['color'];
			}
		}
		elseif( isset($font_array['color-palette']['id']) && isset($the_core_color_settings[$font_array['color-palette']['id']]) ){
            $return['color'] = $the_core_color_settings[$font_array['color-palette']['id']];
		}

		// if is google font
		$return['font-weight'] = $return['font-style'] = '';
		if(isset($font_array['google_font']) && $font_array['google_font']){
			if( strpos( $font_array['variation'], 'italic' ) !== false ) {
				$return['font-style'] = 'italic';
			}
			elseif( strpos( $font_array['variation'], 'oblique' ) !== false ) {
				$return['font-style'] = 'oblique';
			}
			else {
				$return['font-style'] = 'normal';
			}
			$return['font-weight'] = (intval( $font_array['variation'] ) == 0) ? 400 : intval( $font_array['variation']);
			$google_fonts_list[$font_array['family']]['variation'][ $font_array['variation'] ] = $font_array['variation'];
			$google_fonts_list[$font_array['family']]['subset'][ $font_array['subset'] ] = $font_array['subset'];
			update_option( 'fw_theme_google_fonts_list', $google_fonts_list );
		}
		elseif(isset($font_array['style'])){
			$return['font-style']  = $font_array['style'];
			$return['font-weight'] = $font_array['weight'];
		}

		return $return;
	}
endif;


if ( ! function_exists( 'the_core_get_remote_fonts' ) ) :
	/**
	 * Get remote fonts
	 *
	 * @param array $include_from_google
	 */
	function the_core_get_remote_fonts( $include_from_google ) {
		if ( ! sizeof( $include_from_google ) || !defined('FW') ) {
			return '';
		}

		$html = "https://fonts.googleapis.com/css?family=";
		foreach ( $include_from_google as $font => $styles ) {
			if ( array_key_exists( 'false', fw_akg( 'variation', $styles ) ) ) {
				unset( $styles['variation']['false'] );
			}

			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', fw_akg( 'variation', $styles ) ) . '|';

			if ( array_key_exists( 'false', fw_akg( 'subset', $styles ) ) ) {
				unset( $styles['subset']['false'] );
			}

			if ( isset( $styles['subset'] ) && count( $styles['subset'] ) > 1 ) {
				// if font have more than 1 subset
				foreach ( $styles['subset'] as $subset_item ) {
					$subset_key = $subset_item;
					if ( ! empty( $subset_key ) ) {
						$subset[ $subset_key ] = $subset_key;
					}
				}
			} else {
				$subset_key = implode( '', fw_akg( 'subset', $styles ) );
				if ( ! empty( $subset_key ) ) {
					$subset[ $subset_key ] = $subset_key;
				}
			}
		}
		$html = substr( $html, 0, - 1 );
		$html .= '&subset=' . implode( ',', $subset );

		return $html;
	}
endif;


if ( ! function_exists( 'the_core_get_remote_fonts_async' ) ) :
	function the_core_get_remote_fonts_async( $include_from_google ) {
		if ( ! sizeof( $include_from_google ) || ! defined( 'FW' ) ) {
			return '';
		}

		$fonts_families = '';
		$count_general  = 0;
		$count_fonts    = count($include_from_google);
		foreach ( $include_from_google as $font => $styles ) {
			$count_general++;
			// unset "false" variation 
			if ( array_key_exists( 'false', fw_akg( 'variation', $styles ) ) ) {
				unset( $styles['variation']['false'] );
			}

			// unset "false" subset
			if ( array_key_exists( 'false', fw_akg( 'subset', $styles ) ) ) {
				unset( $styles['subset']['false'] );
			}


			// begin quote
			$fonts_families .= "'";

			// font + variation
			$fonts_families .= $font . ':' . implode( ',', fw_akg( 'variation', $styles ) );

			// subset
			if ( isset( $styles['subset'] ) && !empty($styles['subset']) ) {
				$fonts_families .= ':';
				$fonts_families .= implode( ',', fw_akg( 'subset', $styles ) );
			}

			// end quote
			$fonts_families .= "'";
			if ( $count_fonts != $count_general ) {
				$fonts_families .= ',';
			}
		}

		/* example */
		/*families: ['Source Sans Pro:400,600,700,400italic,700italic', 'Roboto Condensed:400,700']*/

		$html = "
		<script>
			WebFontConfig = {
				google: {
					families: [".$fonts_families."]
				}
			};

			(function(d) {
				var wf = d.createElement('script'), s = d.scripts[0];
				wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
				wf.async = true;
				s.parentNode.insertBefore(wf, s);
			})(document);
		</script>";

		return $html;
	}
endif;


if ( ! function_exists( 'the_core_user_has_gravatar' ) ) :
	/**
	 * Return true if user has gravatar
	 *
	 * @param string $email_address
	 */
	function the_core_user_has_gravatar( $email_address ) {
		// Build the Gravatar URL by hasing the email address
		$url = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( $email_address ) ) ) . '?d=404';
		// Now check the headers
		$headers = @get_headers( $url );

		// If 200 is found, the user has a Gravatar; otherwise, they don't.
		return preg_match( '|200|', $headers[0] ) ? true : false;
	}
endif;


if ( ! function_exists( 'the_core_is_real_post_save' ) ) :
	/**
	 * Return true if is real save
	 *
	 * @param integer $post_id
	 */
	function the_core_is_real_post_save( $post_id ) {
		return ! (
			wp_is_post_revision( $post_id )
			|| wp_is_post_autosave( $post_id )
			|| ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			|| ( defined( 'DOING_AJAX' ) && DOING_AJAX )
		);
	}
endif;


if( ! function_exists( 'the_core_array_merge_recursive' ) ) :
	/**
	 * Merge array recursive
	 *
	 * @param array $a
	 * @param array $b
	 */
	function the_core_array_merge_recursive($a, $b) {
		if (!is_array($a) || !is_array($b)) {
			return $a;
		}

		foreach (array_merge(array_keys($a), array_keys($b)) as $k) {
			if (
				isset($b[$k]) && isset($a[$k])
				&&
				is_array($a[$k]) && is_array($b[$k])
			) {
				$a[$k] = the_core_array_merge_recursive($a[$k], $b[$k]);
			} elseif (isset($b[$k])) {
				$a[$k] = $b[$k];
			}
		}

		return $a;
	}
endif;


if ( ! function_exists( 'the_core_get_shortcode_advanced_styles' ) ) :
	/**
	 * Get shortcode advanced styles
	 *
	 * @param array $style
	 * @param array $atts
	 */
	function the_core_get_shortcode_advanced_styles( $style, $atts = array('return_color' => false, 'general_options' => false, 'custom_meta' => '' ) ) {
		$advanced_styles = $title_color = '';

		if($style['is_saved'] !== true && $style['is_saved'] !== 'true') {
			return array('styles' => '', 'classes' => '');
		}

		global $post, $post_google_fonts_list, $google_fonts_list;
		if(isset($style['google_font']) && ($style['google_font'] === true || $style['google_font'] === 'true' ) ){
			$advanced_styles .= isset($style['family']) ? "font-family: '".esc_attr($style['family'])."';" : "";

			if( strpos( $style['variation'], 'italic' ) !== false )
				$advanced_styles  .= 'font-style:italic;';
			elseif( strpos( $style['variation'], 'oblique' ) !== false )
				$advanced_styles  .= 'font-style: oblique;';
			else
				$advanced_styles .= 'font-style: normal;';

			$google_fonts = fw_get_google_fonts();
			$advanced_styles .= (intval( $style['variation'] ) == 0) ? 'font-weight:400;' : 'font-weight:' .intval( $style['variation']) .';';
			if( isset($atts['general_options']) && $atts['general_options'] ) {
				$google_fonts_list[$style['family']]['variation'][ $style['variation'] ] = $style['variation'];
				$google_fonts_list[$style['family']]['subset'][ $style['subset'] ]       = $style['subset'];
				// include and italic variation for font if current font has, because user can use <em> tag
				if ($style['variation'] == 'regular') {
					$italic_variation = "italic";
				}
				else {
					$italic_variation = $style['variation']."italic";
				}
				if( isset($google_fonts[ $style['family'] ]['variants']) && in_array( $italic_variation, $google_fonts[ $style['family'] ]['variants'] ) ) {
					$google_fonts_list[$style['family']]['variation'][ $italic_variation ] = $italic_variation;
				}

				update_option( 'fw_theme_google_fonts_list', $google_fonts_list );
			}
			elseif( isset($atts['custom_meta']) && !empty($atts['custom_meta']) ) {
				$google_fonts_list[$style['family']]['variation'][ $style['variation'] ] = $style['variation'];
				$google_fonts_list[$style['family']]['subset'][ $style['subset'] ]       = $style['subset'];
				// include and italic variation for font if current font has, because user can use <em> tag
				if ($style['variation'] == 'regular') {
					$italic_variation = "italic";
				}
				else {
					$italic_variation = $style['variation']."italic";
				}
				if( isset($google_fonts[ $style['family'] ]['variants']) && in_array( $italic_variation, $google_fonts[ $style['family'] ]['variants'] ) ) {
					$google_fonts_list[$style['family']]['variation'][ $italic_variation ] = $italic_variation;
				}

				update_option( $atts['custom_meta'], $google_fonts_list );
			}
			else {
				$post_google_fonts_list[$style['family']]['variation'][ $style['variation'] ] = $style['variation'];
				$post_google_fonts_list[$style['family']]['subset'][ $style['subset'] ]       = $style['subset'];

				// include and italic variation for font if current font has, because user can use <em> tag
				if ($style['variation'] == 'regular') {
					$italic_variation = "italic";
				}
				else {
					$italic_variation = $style['variation']."italic";
				}
				if( isset($google_fonts[ $style['family'] ]['variants']) && in_array( $italic_variation, $google_fonts[ $style['family'] ]['variants'] ) ) {
					$post_google_fonts_list[$style['family']]['variation'][ $italic_variation ] = $italic_variation;
				}

				if( !is_singular() && function_exists('update_term_meta') ) {
					if ( is_category() ) {
						$term = get_category( get_query_var( 'cat' ), false );
					} else {
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					}
					if( isset($term->term_id) ) {
						$term_id = $term->term_id;
						update_term_meta( $term_id, 'fw_theme_post_google_fonts', $post_google_fonts_list );
					}
				}
				else{
					$post_id = isset( $post->ID ) ? $post->ID : '';
					update_post_meta( $post_id, 'fw_theme_post_google_fonts', $post_google_fonts_list );
				}
			}
		}
		else {
			$advanced_styles .= (isset($style['family']) && !empty($style['family']) ) ? 'font-family:'.esc_attr($style['family']).';' : '';
			$advanced_styles .= (isset($style['style']) && !empty($style['style']) )? 'font-style:'.esc_attr($style['style']).';' : '';
			$advanced_styles .= isset($style['weight']) ? 'font-weight:'.esc_attr($style['weight']).';' : '';
			/* this code cause a problem when a shortcode has 1 google font, then a simple font */
			/*if( !isset($atts['general_options']) || !$atts['general_options'] ) {
				update_post_meta( $post->ID, 'fw_theme_post_google_fonts', array() );
			}*/
		}

		$advanced_styles .= !empty($style['line-height']) ? is_numeric($style['line-height']) ?  'line-height:' . esc_attr($style['line-height']) .'px;' : 'line-height:' . esc_attr($style['line-height']) .';' : '';
		$advanced_styles .= !empty($style['size']) ? is_numeric($style['size']) ?  'font-size:'. esc_attr($style['size']) .'px;' : 'font-size:'. esc_attr($style['size']) .';' : '';
		$advanced_styles .= is_numeric($style['letter-spacing']) ?  'letter-spacing:'. esc_attr($style['letter-spacing']).'px;' : '';

		// text color
		if( isset($style['color-palette']['id']) && $style['color-palette']['id'] !== 'fw-custom'){
			if( $atts['return_color'] ){
				// get colors from db
				global $the_core_color_settings;
				$advanced_styles .= 'color:'.$the_core_color_settings[ $style['color-palette']['id'] ].';';
			}
			else {
				$title_color .= 'fw_theme_text_' . $style['color-palette']['id'];
			}
		}
		elseif( isset($style['color-palette']['color']) && !empty($style['color-palette']['color']) ){
			$advanced_styles .= 'color:'.$style['color-palette']['color'].';';
		}

		if(!empty($advanced_styles))
			$advanced_style = $advanced_styles;
		else
			$advanced_style = '';


		return array('styles' => $advanced_style, 'classes' => $title_color);
	}
endif;


if ( ! function_exists( 'the_core_get_color_palette_color_and_class' ) ) :
	/**
	 * Get colors
	 *
	 * @param array $color_array
	 * @param array $atts
	 */
	function the_core_get_color_palette_color_and_class( $color_array, $atts = array('return_color' => false ) ) {
		$return['color'] = $return['class'] = '';
		if( ! is_array( $color_array ) || empty( $color_array ) ) {
			return $return;
		}
		if ( isset($color_array['id']) && $color_array['id'] == 'fw-custom' ) {
			if ( ! empty( $color_array['color'] ) ) {
				$return['color'] = $color_array['color'];
			}
		} elseif ( isset($color_array['id'] ) ) {
			if( $atts['return_color'] ){
				// get colors from db
				global $the_core_color_settings;
				$return['color'] = $the_core_color_settings[ $color_array['id'] ];
			}
			else {
				$return['class'] = $color_array['id'];
			}
		}

		return $return;
	}
endif;


if ( ! function_exists( 'the_core_hex2rgba' ) ) :
	/**
	 * Convert hexdec color string to rgb(angel) string
	 *
	 * @param string $color
	 * @param boolean $the_core_opacity
	 */
	function the_core_hex2rgba($color, $the_core_opacity = false) {

		$default = 'rgba(0,0,0,0)';

		// Return default if no color provided
		if(empty($color))
			return $default;

		// Sanitize $color if "#" is provided
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		// Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);

		// Check if opacity is set(rgba or rgb) --- if is zero, we need to put RGBA, for some cases in theme options
		if( $the_core_opacity || (int)$the_core_opacity == 0 ){
			if(abs($the_core_opacity) > 1)
				$the_core_opacity = 1.0;
			$output = 'rgba('.implode(",",$rgb).','.$the_core_opacity.')';
		} else {
			$output = 'rgb('.implode(",",$rgb).')';
		}

		// Return rgb(angel) color string
		return $output;
	}
endif;


if ( ! function_exists( 'the_core_get_blog_button' ) ) :
	/**
	 * Get blog button
	 *
	 * @param array $atts
	 */
	function the_core_get_blog_button( $atts = array( 'permalink' => '', 'extra_options' => array() ) ) {
		$blog_button_options = $button_size = array();
        $posts_settings      = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('posts_settings') : array();

        if( isset( $atts['extra_options']['button_options'] ) ) {
            $blog_button_options = $posts_settings['button_options'] = $atts['extra_options']['button_options'];
        }
		elseif( isset( $posts_settings['button_options'] ) ) {
			$blog_button_options = $posts_settings['button_options'];
		}

		// btn size
		if( isset($blog_button_options['size']) ) {
			$button_size = $blog_button_options['size'];
		}
		else{
			// button array is empty
			$button_size['selected'] = 'fw-btn-md';
		}

		if ( isset($button_size['selected']) && $button_size['selected'] == 'custom' ) {
			$btn_size_style = 'width:' . (int) esc_attr( $button_size['custom']['width'] ) . 'px;height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px; line-height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px;';
			$btn_size_class = '';
		} else {
			$btn_size_class = $button_size['selected'];
			$btn_size_style = '';
		}

		$style = 'fw-btn-1';
		if(isset($blog_button_options['style']['selected'])){
			$style = $blog_button_options['style']['selected'];
		}

		// get icon type
		$icon_type = $icon = '';
		if(isset($blog_button_options['icon_type'])) {
			$icon_type = $blog_button_options['icon_type'];
		}

		if(isset($icon_type['tab_icon'])) {
			if ( $icon_type['tab_icon'] == 'icon-class' ) {
				if ( ! empty( $icon_type['icon-class']['icon_class'] ) ) {
					// get icon size
					$icon_size = ! empty( $blog_button_options['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $blog_button_options['icon_size'] ) . 'px;"' : '';
					$icon      = '<i class="' . $blog_button_options['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
				}
			} else {
				if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
					// get image size
					$icon_size = ! empty( $blog_button_options['icon_size'] ) ? 'style="width:' . esc_attr( (int) $blog_button_options['icon_size'] ) . 'px;"' : '';
					$icon      = '<img class="' . $blog_button_options['icon_position'] . '" src="' . esc_url( the_core_change_original_link_with_cdn( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) . '" ' . $icon_size . ' />';
				}
			}
		}
		else{
			$blog_button_options['icon_position'] = '';
			$blog_button_options['label'] = esc_html__('Read More', 'the-core');
		}
		?>
		<a href="<?php echo esc_attr($atts['permalink']); ?>" class="fw-btn-post-read-more-blog fw-btn <?php echo esc_attr( $btn_size_class );?> <?php the_core_button_class($style ); ?>" style="<?php echo ($btn_size_style); ?>">
			<span>
				<?php if ( $blog_button_options['icon_position'] == 'pull-right-icon' ) : ?>
					<?php echo the_core_translate( esc_attr( $blog_button_options['label'] ) ); echo ($icon); ?>
				<?php else : ?>
					<?php echo ($icon); echo the_core_translate( esc_attr( $blog_button_options['label'] ) ); ?>
				<?php endif; ?>
			</span>
		</a>
	<?php }
endif;


if ( ! function_exists( 'the_core_posts_advanced_styles' ) ):
	/**
	 * return blog button styles
	 */
	function the_core_posts_advanced_styles(){
		$final_styles    = '';
		$the_core_settings_option = array();
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$the_core_settings_option = fw_get_db_settings_option();
		}

		if ( isset($the_core_settings_option['posts_settings']['button_options'] ) ) {
			if ( isset( $the_core_settings_option['posts_settings']['button_options']['label_advanced_styling'] ) ) {
				if ( isset( $the_core_settings_option['posts_settings']['button_options']['style']['selected'] ) ) {
					$button_type = $the_core_settings_option['posts_settings']['button_options']['style']['selected'];
				} else {
					$button_type = 'fw-btn-1';
				}
				// button label advanced styling
				$label_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['posts_settings']['button_options']['label_advanced_styling']['text'], array('return_color' => true, 'general_options' => true ) );
				if( !empty( $label_advanced_styling['styles'] ) ) {
					$final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.' span {'.$label_advanced_styling['styles'].'}';
					// responsive label styling
					$label_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['posts_settings']['button_options']['label_advanced_styling']['text'], 'selector' => '.postlist .fw-btn-post-read-more-blog span' ) );
					if( !empty($label_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$label_responsive_styles.'}';
				}

				// label text hover
				$hover_text_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['button_options']['label_advanced_styling']['hover_text_color'], array('return_color' => true ) );
				if( !empty($hover_text_color['color']) ) $final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.':hover span' . '{ color: '.$hover_text_color['color'].' !important }';
			}

			// button color options
			if( isset($the_core_settings_option['posts_settings']['button_options']['style']['selected']) ){
				$button_type = $the_core_settings_option['posts_settings']['button_options']['style']['selected'];
				if($the_core_settings_option['posts_settings']['button_options']['style']['selected'] == 'fw-btn-3'){
					if( isset($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-3']['border_size']) && !empty($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-3']['border_size']) ){
						$final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.'{ border-top-width: '.(int)$the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-3']['border_size'].'px; border-bottom-width: '.(int)$the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-3']['border_size'].'px; }';
					}
					// btn color
					if ( isset( $the_core_settings_option['posts_settings']['button_options']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['button_options']['normal_color'], array('return_color' => true ) );
						if( !empty($normal_color['color']) ) $final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.'{ border-bottom-color: '.$normal_color['color'].'; border-top-color: '.$normal_color['color'].' }';
					}
					// hover color
					if ( isset( $the_core_settings_option['posts_settings']['button_options']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['button_options']['hover_color'], array('return_color' => true ) );
						if( !empty($hover_color['color']) ) $final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.':hover, .postlist .fw-btn-post-read-more-blog.'.$button_type.':focus { background-color: '.$hover_color['color'].'; border-bottom-color: '.$hover_color['color'].'; border-top-color: '.$hover_color['color'].' }';
					}
				}
				elseif($the_core_settings_option['posts_settings']['button_options']['style']['selected'] == 'fw-btn-2'){
					if( isset($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-2']['border_size']) && !empty($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-2']['border_size']) ){
						$final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.'{ border-width: '.(int)$the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-2']['border_size'].'px; }';
					}
					if( isset($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-2']['border_radius']) && !empty($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-2']['border_radius']) ){
						$final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.'{ border-radius: '.(int)$the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-2']['border_radius'].'px; }';
					}

					// btn color
					if ( isset( $the_core_settings_option['posts_settings']['button_options']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['button_options']['normal_color'], array('return_color' => true ) );
						if( !empty($normal_color['color']) ) $final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.'{ border-color: '.$normal_color['color'].' }';
					}
					// hover color
					if ( isset( $the_core_settings_option['posts_settings']['button_options']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['button_options']['hover_color'], array('return_color' => true ) );
						if( !empty($hover_color['color']) ) $final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.':hover { background-color: '.$hover_color['color'].'; border-color: '.$hover_color['color'].' }';
					}
				}
				elseif($the_core_settings_option['posts_settings']['button_options']['style']['selected'] == 'fw-btn-1'){
					if( isset($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-1']['border_radius']) && !empty($the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-1']['border_radius']) ){
						$final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.'{ border-radius: '.(int)$the_core_settings_option['posts_settings']['button_options']['style']['fw-btn-1']['border_radius'].'px; }';
					}

					// btn color
					if ( isset( $the_core_settings_option['posts_settings']['button_options']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['button_options']['normal_color'], array('return_color' => true ) );
						if( !empty($normal_color['color']) ) $final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.'{ background-color: '.$normal_color['color'].' }';
					}
					// hover color
					if ( isset( $the_core_settings_option['posts_settings']['button_options']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['button_options']['hover_color'], array('return_color' => true ) );
						if( !empty($hover_color['color']) ) $final_styles .= '.postlist .fw-btn-post-read-more-blog.'.$button_type.':hover { background-color: '.$hover_color['color'].' }';
					}
				}
			}
		}

		// general posts header
		if( isset($the_core_settings_option['general_posts_header']['posts_header_title']) ){
			$selected_title = $the_core_settings_option['general_posts_header']['posts_header_title']['posts_title'];
			if($selected_title == 'custom_title' || $selected_title == 'category_title'){
				$header_title_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_posts_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_posts_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
				$header_subtitle_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_posts_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
				if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
					$final_styles .= 'section.post .fw-special-subtitle{'.$header_subtitle_advanced_styling['styles'].'}';
					// responsive subtitle styling
					$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_posts_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], 'selector' => 'section.post .fw-special-subtitle' ) );
					if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
				}
			}
			else{
				// post title
				$header_title_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_posts_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_posts_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
			}
			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$final_styles .= 'section.post .fw-special-title{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $title_selector, 'selector' => 'section.post .fw-special-title' ) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
		}

		// general portfolio header
		if( isset($the_core_settings_option['general_portfolio_header']['posts_header_title']) ){
			$selected_title = $the_core_settings_option['general_portfolio_header']['posts_header_title']['posts_title'];
			if($selected_title == 'custom_title' || $selected_title == 'category_title'){
				$header_title_advanced_styling    = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_portfolio_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_portfolio_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
				$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_portfolio_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
				if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
					$final_styles .= 'section.fw-portfolio .fw-special-subtitle{'.$header_subtitle_advanced_styling['styles'].'}';
				}
				// responsive subtitle styling
				$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_portfolio_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], 'selector' => 'section.fw-portfolio .fw-special-subtitle' ) );
				if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
			}
			else{
				// post title
				$header_title_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_portfolio_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_portfolio_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
			}
			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$final_styles .= 'section.fw-portfolio .fw-special-title{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $title_selector, 'selector' => 'section.fw-portfolio .fw-special-title' ) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
		}

		// general events header
		if( isset($the_core_settings_option['general_events_header']['posts_header_title']) ){
			$selected_title = $the_core_settings_option['general_events_header']['posts_header_title']['posts_title'];
			if($selected_title == 'custom_title' || $selected_title == 'category_title'){
				$header_title_advanced_styling    = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_events_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_events_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
				$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_events_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
				if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
					$final_styles .= 'section.fw-event .fw-special-subtitle{'.$header_subtitle_advanced_styling['styles'].'}';
					// responsive subtitle styling
					$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_events_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], 'selector' => 'section.fw-event .fw-special-subtitle' ) );
					if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
				}
			}
			else{
				// post title
				$header_title_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_events_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_events_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
			}
			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$final_styles .= 'section.fw-event .fw-special-title{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $title_selector, 'selector' => 'section.fw-event .fw-special-title' ) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
		}

		// general lessons header
		if( isset($the_core_settings_option['general_learning_header']['posts_header_title']) ){
			$selected_title = $the_core_settings_option['general_learning_header']['posts_header_title']['posts_title'];
			if($selected_title == 'custom_title' || $selected_title == 'category_title'){
				$header_title_advanced_styling    = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_learning_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_learning_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
				$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_learning_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
				if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
					$final_styles .= 'section.fw-learning-courses .fw-special-subtitle, section.fw-learning-articles .fw-special-subtitle{'.$header_subtitle_advanced_styling['styles'].'}';
					// responsive subtitle styling
					$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_learning_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], 'selector' => 'section.fw-learning-courses .fw-special-subtitle, section.fw-learning-articles .fw-special-subtitle' ) );
					if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
				}
			}
			else{
				// post title
				$header_title_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_learning_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_learning_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
			}
			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$final_styles .= 'section.fw-learning-courses .fw-special-title, section.fw-learning-articles .fw-special-title{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $title_selector, 'selector' => 'section.fw-learning-courses .fw-special-title, section.fw-learning-articles .fw-special-title' ) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
		}

		// general products header
		if( isset($the_core_settings_option['general_products_header']['posts_header_title']) ){
			$selected_title = $the_core_settings_option['general_products_header']['posts_header_title']['posts_title'];
			if($selected_title == 'custom_title' || $selected_title == 'category_title'){
				$header_title_advanced_styling    = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_products_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_products_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
				$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_products_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
				if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
					$final_styles .= 'section.product .fw-special-subtitle{'.$header_subtitle_advanced_styling['styles'].'}';
					// responsive subtitle styling
					$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_products_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], 'selector' => 'section.product .fw-special-subtitle' ) );
					if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
				}
			}
			else{
				// post title
				$header_title_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_products_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_selector = $the_core_settings_option['general_products_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
			}
			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$final_styles .= 'section.product .fw-special-title, .post-type-archive-product .fw-section-image .fw-special-title{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $title_selector, 'selector' => 'section.product .fw-special-title, .post-type-archive-product .fw-section-image .fw-special-title' ) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
		}

		// general bbpress header
		if( isset($the_core_settings_option['general_bbpress_header']['header_title_typography']) ) {
			// title
			$header_title_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_bbpress_header']['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$title_selector = '.topic .fw-section-image .fw-special-title, .forum .fw-section-image .fw-special-title, .forum-archive .fw-section-image .fw-special-title';
				$final_styles .= $title_selector.'{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_bbpress_header']['header_title_typography']['title'], 'selector' => $title_selector) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
			// description
			$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_bbpress_header']['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
			if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
				$subtitle_selector = '.topic .fw-section-image .fw-special-subtitle, .forum .fw-section-image .fw-special-subtitle, .forum-archive .fw-section-image .fw-special-subtitle';
				$final_styles .= $subtitle_selector.'{'.$header_subtitle_advanced_styling['styles'].'}';
				// responsive subtitle styling
				$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_bbpress_header']['header_subtitle_typography']['subtitle'], 'selector' => $subtitle_selector ) );
				if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
			}
		}

		// general byddypress header
		if( isset($the_core_settings_option['general_buddypress_header']['header_title_typography']) ) {
			// title
			$header_title_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_buddypress_header']['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$title_selector = '.buddypress .fw-section-image .fw-special-title';
				$final_styles .= $title_selector.'{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_buddypress_header']['header_title_typography']['title'], 'selector' => $title_selector) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
			// description
			$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_buddypress_header']['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
			if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
				$subtitle_selector = '.buddypress .fw-section-image .fw-special-subtitle';
				$final_styles .= $subtitle_selector.'{'.$header_subtitle_advanced_styling['styles'].'}';
				// responsive subtitle styling
				$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_buddypress_header']['header_subtitle_typography']['subtitle'], 'selector' => $subtitle_selector ) );
				if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
			}
		}

		// general courses header
		if( isset($the_core_settings_option['general_courses_header']['posts_header_title']) ){
			$selected_title = $the_core_settings_option['general_courses_header']['posts_header_title']['posts_title'];
			if($selected_title == 'custom_title' || $selected_title == 'category_title'){
				$header_title_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_courses_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_styles = $the_core_settings_option['general_courses_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
				$header_subtitle_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_courses_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
				if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
					$subtitle_selector = '.single-course .fw-section-image .fw-special-subtitle, .single-lesson .fw-section-image .fw-special-subtitle, .single-llms_quiz .fw-section-image .fw-special-subtitle, .post-type-archive-course .fw-section-image .fw-special-subtitle, .single-llms_question .fw-section-image .fw-special-subtitle, .single-llms_membership .fw-section-image .fw-special-subtitle, .learnpress .fw-section-image .fw-special-subtitle';
					$final_styles .= $subtitle_selector.'{'.$header_subtitle_advanced_styling['styles'].'}';
					// responsive subtitle styling
					$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_courses_header']['posts_header_title'][$selected_title]['header_subtitle_typography']['subtitle'], 'selector' => $subtitle_selector ) );
					if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
				}
			}
			else{
				// post title
				$header_title_advanced_styling  = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_courses_header']['posts_header_title'][$selected_title]['header_title_typography']['title'], array('return_color' => true, 'general_options' => true ) );
				$title_styles = $the_core_settings_option['general_courses_header']['posts_header_title'][$selected_title]['header_title_typography']['title'];
			}

			if( !empty( $header_title_advanced_styling['styles'] ) ) {
				$title_selector = '.single-course .fw-section-image .fw-special-title, .single-lesson .fw-section-image .fw-special-title, .single-llms_quiz .fw-section-image .fw-special-title, .post-type-archive-course .fw-section-image .fw-special-title, .single-llms_question .fw-section-image .fw-special-title, .post-type-archive-llms_membership .fw-section-image .fw-special-title, .single-llms_membership .fw-section-image .fw-special-title, .learnpress .fw-section-image .fw-special-title';
				$final_styles .= $title_selector.'{'.$header_title_advanced_styling['styles'].'}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $title_styles, 'selector' => $title_selector ) );
				if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
			}
		}

		// general page header
		if( isset($the_core_settings_option['general_page_header']['header_title_typography']['title']) ) {
			$header_title_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_page_header']['header_title_typography']['title'], array( 'return_color' => true, 'general_options' => true ) );
			if ( ! empty( $header_title_advanced_styling['styles'] ) ) $final_styles .= '.page .fw-section-default-page .fw-special-title{'.$header_title_advanced_styling['styles'].'}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_page_header']['header_title_typography']['title'], 'selector' => '.page .fw-section-default-page .fw-special-title' ) );
			if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';
		}

		// general homepage header
		if( get_option('show_on_front', 'posts') == 'posts' && isset($the_core_settings_option['general_homepage_header']['header_title_typography']['title']) ) {
			// title
			$header_title_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_homepage_header']['header_title_typography']['title'], array( 'return_color' => true, 'general_options' => true ) );
			if ( ! empty( $header_title_advanced_styling['styles'] ) ) $final_styles .= '.home .fw-section-default-page .fw-special-title{'.$header_title_advanced_styling['styles'].'}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_homepage_header']['header_title_typography']['title'], 'selector' => '.home .fw-section-default-page .fw-special-title' ) );
			if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';

			// description
			$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_settings_option['general_homepage_header']['header_subtitle_typography']['subtitle'], array('return_color' => true, 'general_options' => true ) );
			if( !empty( $header_subtitle_advanced_styling['styles'] ) ) {
				$subtitle_selector = '.home .fw-section-image .fw-special-subtitle';
				$final_styles .= $subtitle_selector.'{'.$header_subtitle_advanced_styling['styles'].'}';
				// responsive subtitle styling
				$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['general_homepage_header']['header_subtitle_typography']['subtitle'], 'selector' => $subtitle_selector ) );
				if( !empty($subtitle_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$subtitle_responsive_styles.'}';
			}
		}

		return $final_styles;
	}
endif;


if ( ! function_exists( 'the_core_blog_title_styles' ) ):
	/**
	 * return blog title styles
	 */
	function the_core_blog_title_styles(){
		$final_styles = '';
		$the_core_blog_title   = array();
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$the_core_blog_title = fw_get_db_settings_option('posts_settings/blog_title');
		}

		if ( isset( $the_core_blog_title['selected'] ) && !empty($the_core_blog_title['selected']) ) {
			// title advanced styling
			$h = $the_core_blog_title['selected'];
			$the_core_blog_title_advanced_styling = the_core_get_shortcode_advanced_styles( $the_core_blog_title[$h]['advanced_styling'][$h], array('return_color' => true, 'general_options' => true ) );
			if(!empty($the_core_blog_title_advanced_styling['styles'])) $final_styles .= '.post '.$h.'.entry-title, .post '.$h.'.entry-title a {'.$the_core_blog_title_advanced_styling['styles'].'}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_blog_title[$h]['advanced_styling'][$h], 'selector' => '.post '.$h.'.entry-title, .post '.$h.'.entry-title a' ) );
			if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){'.$title_responsive_styles.'}';

			// hover color
			$hover_color = the_core_get_color_palette_color_and_class( $the_core_blog_title[$h]['advanced_styling']['hover_color'], array('return_color' => true ) );
			if( !empty($hover_color['color']) ) $final_styles .= '.post '.$h.'.entry-title a:hover { color: '.$hover_color['color'].' !important }';
		}

		return $final_styles;
	}
endif;


if ( ! function_exists( 'the_core_get_blog_comments_number' ) ):
	/**
	 * return post comments number
	 *
	 * @param array $atts
	 */
	function the_core_get_blog_comments_number( $atts = array('permalink' => '#', 'extra_options' => array() ) ) {
		$comments_number['selected'] = 'yes';
		$comments_number['yes']['comments_number_type'] = 'fw-comment-link-type-1';
		if( function_exists('fw_get_db_settings_option') ) {
			$comments_number = fw_get_db_settings_option( 'posts_settings/display_comments_number' );
            // for extra options (shortcodes or other source)
            if( isset( $atts['extra_options']['display_comments_number'] ) ) {
                $comments_number = array_merge( $comments_number, $atts['extra_options']['display_comments_number'] );
            }
		}

		if($comments_number['selected'] == 'yes') : ?>
            <?php if( $comments_number['yes']['comments_number_type'] == 'fw-comment-link-type-6') : ?>
                <a href="<?php echo esc_attr($atts['permalink']); ?>#comments" class="comments-link fw-comment-link-type-6">
                    <span class="text-comments"><?php comments_number( esc_html__( 'Comments', 'the-core' ), esc_html__( 'Comment', 'the-core' ), esc_html__( 'Comments', 'the-core' ) ); ?></span>
                    <span class="divide-comments"><?php echo apply_filters( 'fw_comment_link_type_6_separator', '/'); ?></span>
                    <span><?php comments_number( esc_html__( '0', 'the-core' ), esc_html__( '1', 'the-core' ), esc_html__( '%', 'the-core' ) ); ?></span>
                </a>
            <?php else : ?>
			    <a href="<?php echo esc_attr($atts['permalink']); ?>#comments" class="comments-link <?php echo esc_attr($comments_number['yes']['comments_number_type']); ?>"><span><?php comments_number( esc_html__( '0', 'the-core' ), esc_html__( '1', 'the-core' ), esc_html__( '%', 'the-core' ) ); ?></span></a>
            <?php endif; ?>
		<?php endif;
	}
endif;


if ( ! function_exists( 'the_core_top_bar' ) ):
	/**
	 * Display top bar

	 * @param array $atts
	 */
	function the_core_top_bar( $atts = array('top_bar_text' => '', 'enable_header_socials' => '', 'enable_search' => '', 'search_type' => '', 'placeholder_text' => '', 'search_position' => '') ){ ?>
		<?php
			// fix polylang translations problem on the server using "pll__" function
			$atts['top_bar_text'] = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'header_settings/enable_header_top_bar/yes/header_text' ) : '';
			$atts['top_bar_text'] = function_exists( 'pll__' ) ? pll__($atts['top_bar_text']) : $atts['top_bar_text'];
		?>
		<div class="fw-top-bar">
			<div class="fw-container">
				<?php if( is_rtl() ) : ?>
					<?php if ( $atts['enable_search'] == 'yes' && $atts['search_position'] == 'top_bar') {
						the_core_header_search( array('search_type' => $atts['search_type'], 'placeholder_text' => $atts['placeholder_text']) );
					} ?>
					<?php if ( $atts['enable_header_socials'] == 'yes' ) {
						echo the_core_get_socials( 'fw-top-bar-social' );
					} ?>
					<?php if ( $atts['top_bar_text'] != '' ) : ?>
						<div class="fw-text-top-bar"><?php echo do_shortcode($atts['top_bar_text']); ?></div>
					<?php endif; ?>
				<?php else: ?>
					<?php if ( $atts['top_bar_text'] != '' ) : ?>
						<div class="fw-text-top-bar"><?php echo do_shortcode($atts['top_bar_text']); ?></div>
					<?php endif; ?>
					<?php if ( $atts['enable_header_socials'] == 'yes' ) {
						echo the_core_get_socials( 'fw-top-bar-social' );
					} ?>
					<?php if ( $atts['enable_search'] == 'yes' && $atts['search_position'] == 'top_bar') {
						the_core_header_search( array('search_type' => $atts['search_type'], 'placeholder_text' => $atts['placeholder_text']) );
					} ?>
				<?php endif; ?>
			</div>
		</div>
	<?php }
endif;


if ( ! function_exists( 'the_core_get_footer_class' ) ):
	/**
	 * get footer class
	 *
	 * @param boolean $return
	 */
	function the_core_get_footer_class( $return = false ){
		$the_core_footer_settings = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('footer_settings') : array();
		if ( isset($the_core_footer_settings['show_menu_bar']['selected_value']) && $the_core_footer_settings['show_menu_bar']['selected_value'] == 'yes' ) {
			if ( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['selected_value'] == 'yes' ) {
				if ( ! empty( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo'] ) && isset($the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo_retina']) ) {
					if($return) {
						return $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo_retina'];
					}
					else{
						echo esc_attr($the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo_retina']);
					}
				}
			}
		}
	}
endif;


if ( ! function_exists( 'the_core_list_pages' ) ):
	/**
	 * get an array of all pages
	 */
	function the_core_list_pages() {
		$pages = get_pages();
		$result = array();
		$result[0] = esc_html__('None', 'the-core');
		foreach ( $pages as $page ) {
			$result[ $page->ID ] = $page->post_title;
		}
		return $result;
	}
endif;


if ( ! function_exists( 'the_core_return_memory_size' ) ) :
	/**
	 * print theme requirements page
	 *
	 * @param string $size
	 */
	function the_core_return_memory_size( $size ) {
		$symbol = substr( $size, -1 );
		$return = (int)$size;
		switch ( strtoupper( $symbol ) ) {
			case 'P':
				$return *= 1024;
			case 'T':
				$return *= 1024;
			case 'G':
				$return *= 1024;
			case 'M':
				$return *= 1024;
			case 'K':
				$return *= 1024;
		}
		return $return;
	}
endif;


if( ! function_exists( 'the_core_responsive_styles' ) ) :
	/**
	 * return theme responsive styles
	 */
	function the_core_responsive_styles() {
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$the_core_settings_option = fw_get_db_settings_option();
			if( empty($the_core_settings_option) ) {
				return;
			}

			$final_styles  = '';
			$final_styles .= "@media(max-width:767px){"."\n";
			// h1
			$h1_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h1'], 'selector' => 'h1, .h1' ));
			if( !empty($h1_styles) ) $final_styles .= $h1_styles."\n";

			// h2
			$h2_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h2'], 'selector' => 'h2, .h2, .woocommerce .page-title, .woocommerce div.product .product_title' ));
			if( !empty($h2_styles) ) $final_styles .= $h2_styles."\n";

			// h3
			$h3_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h3'], 'selector' => 'h3, .h3' ));
			if( !empty($h3_styles) ) $final_styles .= $h3_styles."\n";

			// h4
			$h4_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h4'], 'selector' => 'h4, .h4' ));
			if( !empty($h4_styles) ) $final_styles .= $h4_styles."\n";

			// h5
			$h5_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h5'], 'selector' => 'h5, .h5' ));
			if( !empty($h5_styles) ) $final_styles .= $h5_styles."\n";

			// h6
			$h6_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h6'], 'selector' => 'h6, .h6' ));
			if( !empty($h6_styles) ) $final_styles .= $h6_styles."\n";

			// subtitles
			$subtitles_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['subtitles'], 'selector' => '.fw-special-subtitle, .fw-heading .fw-special-subtitle' ));
			if( !empty($subtitles_styles) ) $final_styles .= $subtitles_styles."\n";

			// woocomerce title
			$h3_woocomerce_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h3'], 'selector' => '.woocommerce .woocommerce-tabs .panel.entry-content h2, .woocommerce .related.products h2, .woocommerce #reviews h2, .woocommerce .comment-respond h3.comment-reply-title, .woocommerce ul.products li.product h3, .woocommerce .comment-reply-title', 'important' => true ));
			if( !empty($h3_woocomerce_styles) ) $final_styles .= $h3_woocomerce_styles."\n";

			$h6_woocomerce_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['typography_settings']['h3'], 'selector' => '.entry-content .woocommerce h2, .woocommerce .product h2, .woocommerce .addresses h3, .woocommerce h3'));
			if( !empty($h6_woocomerce_styles) ) $final_styles .= $h6_woocomerce_styles."\n";

			// search styles
			$the_core_search_type = $the_core_settings_option['header_settings']['enable_search']['yes']['search_type']['selected'];
			if ( isset( $the_core_settings_option['header_settings']['enable_search']['yes']['search_type'][$the_core_search_type]['search_advanced_styling']['input_typography'] ) ) {
				if($the_core_search_type == 'fw-input-search'){
					$selector = 'input.fw-input-search';
				}
				else{
					$selector = '.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-input-search';
				}

				$search_styles = the_core_responsive_heading_styles( array( 'styles' => $the_core_settings_option['header_settings']['enable_search']['yes']['search_type'][$the_core_search_type]['search_advanced_styling']['input_typography'], 'selector' => $selector ) );
				if( !empty($search_styles) ) $final_styles .= $search_styles;
			}

			$final_styles .= '}';
			return $final_styles;
		}
	}
endif;


if( ! function_exists( 'the_core_responsive_heading_styles' ) ) :
	/**
	 * return text size styles
	 *
	 * @param array $atts
	 */
	function the_core_responsive_heading_styles( $atts = array( 'styles' => array(), 'selector' => '', 'important' => false ) ) {
		$return_html = '';
		if($atts['styles']['is_saved'] !== true && $atts['styles']['is_saved'] !== 'true') {
			return $return_html;
		}

		$important = '';
		if( isset($atts['important']) && $atts['important'] ){
			$important = ' !important';
		}

		if( !empty($atts['styles']) && !empty($atts['selector']) ) {
			$atts['styles']['size'] = (int) $atts['styles']['size'];
			$atts['styles']['line-height'] = (int) $atts['styles']['line-height'];
			if ( $atts['styles']['size'] >= 20 && $atts['styles']['size'] <= 25 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.9, 0 ) . 'px ' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.9, 0 ) . 'px ' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 26 && $atts['styles']['size'] <= 30 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.8, 0 ) . 'px ' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.8, 0 ) . 'px ' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 31 && $atts['styles']['size'] <= 45 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.7, 0 ) . 'px ' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.7, 0 ) . 'px ' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 46 && $atts['styles']['size'] <= 65 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.6, 0 ) . 'px ' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.6, 0 ) . 'px ' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 66 && $atts['styles']['size'] <= 80 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.5, 0 ) . 'px ' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.5, 0 ) . 'px ' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 81 && $atts['styles']['size'] <= 100 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.4, 0 ) . 'px ' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.4, 0 ) . 'px ' . $important . ';}';
			} elseif ( $atts['styles']['size'] > 100 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.3, 0 ) . 'px ' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.3, 0 ) . 'px ' . $important . ';}';
			}
		}
		return $return_html;
	}
endif;


if ( ! function_exists( 'the_core_is_page_url_excluded' ) ) :
	/**
	 * Check if is page is from excluded pages
	 */
	function the_core_is_page_url_excluded() {
		$exception_urls = array( 'wp-login.php', 'async-upload.php', '/plugins/', 'wp-admin/', 'upgrade.php', 'trackback/', 'feed/' );
		foreach ( $exception_urls as $url ){
			if ( strstr( $_SERVER['PHP_SELF'], $url) ) return true;
		}

		if ( strstr($_SERVER['QUERY_STRING'], 'feed=') ) return true;

		return false;
	}
endif;


if ( ! function_exists( 'the_core_portfolio_styles' ) ) :
	/**
	 * Portfolio styles for categories
	 */
	function the_core_portfolio_styles() {
		$styling = '';
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$the_core_settings_option = fw_get_db_settings_option();
			$selected_portfolio = isset($the_core_settings_option['portfolio_style']['selected']) ? $the_core_settings_option['portfolio_style']['selected'] : '';

			//styles for portfolio type 1
			if ( $selected_portfolio == 'style1' ) {
				$portfolio = $the_core_settings_option['portfolio_style']['style1'];

				if ( isset( $portfolio['style1_advanced_styling'] ) ) {
					$portfolio_settings = $portfolio['style1_advanced_styling'];

					//title styling
					if ( isset( $portfolio_settings['title'] ) ) {
						$title = the_core_get_shortcode_advanced_styles( $portfolio_settings['title'], array( 'return_color' => true, 'general_options' => true ) );
						if ( ! empty( $title['styles'] ) ) {
							$styling .= '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title{' . $title['styles'] . '}';
						}
						// responsive title styling
						$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles'   => $portfolio_settings['title'], 'selector' => '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title' ) );
						if ( ! empty( $title_responsive_styles ) ) {
							$styling .= '@media(max-width:767px){' . $title_responsive_styles . '}';
						}
					}
					//subtitle styling
					if ( isset( $portfolio_settings['subtitle'] ) ) {
						$subtitle = the_core_get_shortcode_advanced_styles( $portfolio_settings['subtitle'], array( 'return_color' => true, 'general_options' => true ) );
						if ( ! empty( $subtitle['styles'] ) ) {
							$styling .= '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description{' . $subtitle['styles'] . '}';
						}
						// responsive subtitle styling
						$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles'   => $portfolio_settings['subtitle'], 'selector' => '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description' ) );
						if ( ! empty( $subtitle_responsive_styles ) ) {
							$styling .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
						}
					}

					//separator settings
					if ( $portfolio_settings['separator_group']['selected'] == 'no' ) {
						$styling .= '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title:before {display:none; }';
						$styling .= '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title{ margin-bottom: 15px; }';
					} else {
						$separator_color_style = '';
						$separator_width       = ! empty( $portfolio_settings['separator_group']['yes']['separator_width'] ) ? 'width:' . (int) esc_attr( $portfolio_settings['separator_group']['yes']['separator_width'] ) . 'px; max-width:100%;' : '';

						$separator_color = the_core_get_color_palette_color_and_class( $portfolio_settings['separator_group']['yes']['separator_color'], array( 'return_color' => true ) );

						if ( ! empty( $separator_color['color'] ) ) {
							$separator_color_style = 'background-color:' . $separator_color['color'] . ';';
						}

						if ( ! empty( $separator_width ) || ! empty( $separator_color_style ) ) {
							$styling .= '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title:before{' . $separator_width . $separator_color_style . '}';
						}
					}

					//hover background color
					if ( isset( $portfolio_settings['hover_bg_color'] ) ) {
						$hover_bg_color   = the_core_get_color_palette_color_and_class( $portfolio_settings['hover_bg_color'], array( 'return_color' => true ) );
						$hover_bg_opacity = isset( $portfolio_settings['opacity_bg_color'] ) && ! empty( $portfolio_settings['opacity_bg_color'] ) ? ( $portfolio_settings['opacity_bg_color'] / 100 ) : false;

						if ( ! empty( $hover_bg_color['color'] ) ) {
							$styling .= '.archive .fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay{background-color:' . the_core_hex2rgba( $hover_bg_color['color'], $hover_bg_opacity ) . '}';
						}
					}


					//border settings
					if ( $portfolio_settings['border_group']['selected'] == 'no' ) {
						$styling .= '.archive .fw-portfolio-1 .fw-portfolio-list li{border: none}';
					} else {
						$border_color_style = '';
						$border_width       = ! empty( $portfolio_settings['border_group']['yes']['border_size'] ) ? 'border-width:' . (int) esc_attr( $portfolio_settings['border_group']['yes']['border_size'] ) . 'px;' : '';

						$border_color = the_core_get_color_palette_color_and_class( $portfolio_settings['border_group']['yes']['border_color'], array( 'return_color' => true ) );

						if ( ! empty( $border_color['color'] ) ) {
							$border_color_style = 'border-color:' . $border_color['color'] . ';';
						}

						if ( ! empty( $border_width ) || ! empty( $border_color_style ) ) {
							$styling .= '.archive .fw-portfolio-1 .fw-portfolio-list li{' . $border_width . $border_color_style . '}';
						}
					}

					//frame settings
					if ( $portfolio_settings['frame_group']['selected'] == 'no' ) {
						$styling .= '.archive .fw-portfolio-1 .fw-portfolio-list li{padding: 0px;}';
					} else {
						$frame_color_style = '';
						$frame_width       = ! empty( $portfolio_settings['frame_group']['yes']['frame_size'] ) ? 'padding:' . (int) esc_attr( $portfolio_settings['frame_group']['yes']['frame_size'] ) . 'px;' : '';

						$frame_color = the_core_get_color_palette_color_and_class( $portfolio_settings['frame_group']['yes']['frame_color'], array( 'return_color' => true ) );

						if ( ! empty( $frame_color['color'] ) ) {
							$frame_color_style = 'background-color:' . $frame_color['color'] . ';';
						}

						if ( ! empty( $frame_width ) || ! empty( $frame_color_style ) ) {
							$styling .= '.archive .fw-portfolio-1 .fw-portfolio-list li{' . $frame_width . $frame_color_style . '}';
						}
					}

					//shadow settings
					if ( $portfolio_settings['shadow_group']['selected'] != 'no' ) {
						$shadow_horizontal = (int) esc_attr( $portfolio_settings['shadow_group']['yes']['shadow_horiontal'] ) . 'px';
						$shadow_vertical   = (int) esc_attr( $portfolio_settings['shadow_group']['yes']['shadow_vertical'] ) . 'px';
						$shadow_blur       = (int) esc_attr( $portfolio_settings['shadow_group']['yes']['shadow_blur'] ) . 'px';
						$shadow_size       = (int) esc_attr( $portfolio_settings['shadow_group']['yes']['shadow_size'] ) . 'px';
						$shadow_color      = $portfolio_settings['shadow_group']['yes']['shadow_color'];

						$styling .= '.archive .fw-portfolio-1 .fw-portfolio-list li{
						-webkit-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						-moz-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
					}';

					}
				}
			} //portfolio for style 2
			elseif ( $selected_portfolio == 'style2' ) {
				$portfolio = $the_core_settings_option['portfolio_style']['style2'];

				if ( isset( $portfolio['style2_advanced_styling'] ) ) {
					$portfolio_settings = $portfolio['style2_advanced_styling'];

					//title styling
					if ( isset( $portfolio_settings['title'] ) ) {
						$title = the_core_get_shortcode_advanced_styles( $portfolio_settings['title'], array( 'return_color' => true, 'general_options' => true ) );
						if ( ! empty( $title['styles'] ) ) {
							$styling .= '.archive .fw-portfolio-2 .fw-portfolio-title a, .archive .fw-portfolio-2 .fw-portfolio-wrapper .fw-portfolio-title{' . $title['styles'] . '}';
						}
						// responsive title styling
						$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles'   => $portfolio_settings['title'], 'selector' => '.archive .fw-portfolio-2 .fw-portfolio-title a, .archive .fw-portfolio-2 .fw-portfolio-wrapper .fw-portfolio-title' ) );
						if ( ! empty( $title_responsive_styles ) ) {
							$styling .= '@media(max-width:767px){' . $title_responsive_styles . '}';
						}
					}
					//subtitle styling
					if ( isset( $portfolio_settings['description'] ) ) {
						$desc = the_core_get_shortcode_advanced_styles( $portfolio_settings['description'], array( 'return_color' => true, 'general_options' => true ) );
						if ( ! empty( $desc['styles'] ) ) {
							$styling .= '.archive .fw-portfolio-2 .fw-portfolio-description .fw-portfolio-content{' . $desc['styles'] . '}';
						}
						// responsive description styling
						$description_responsive_styles = the_core_responsive_heading_styles( array( 'styles'   => $portfolio_settings['description'], 'selector' => '.archive .fw-portfolio-2 .fw-portfolio-description .fw-portfolio-content' ) );
						if ( ! empty( $description_responsive_styles ) ) {
							$styling .= '@media(max-width:767px){' . $description_responsive_styles . '}';
						}
					}
					//background color
					if ( isset( $portfolio_settings['bg_color'] ) ) {
						$bg_color = the_core_get_color_palette_color_and_class( $portfolio_settings['bg_color'], array( 'return_color' => true ) );
						if ( ! empty( $bg_color['color'] ) ) {
							$styling .= '.archive .fw-portfolio-2 .fw-portfolio-description{background-color:' . $bg_color['color'] . '}';
						}
					}

					//get paddings
					$padding_top    = ( isset( $portfolio_settings['padding_top'] ) && $portfolio_settings['padding_top'] != '' ) ? 'padding-top:' . (int) esc_attr( $portfolio_settings['padding_top'] ) . 'px;' : '';
					$padding_right  = ( isset( $portfolio_settings['padding_right'] ) && $portfolio_settings['padding_right'] != '' ) ? 'padding-right:' . (int) esc_attr( $portfolio_settings['padding_right'] ) . 'px;' : '';
					$padding_bottom = ( isset( $portfolio_settings['padding_bottom'] ) && $portfolio_settings['padding_bottom'] != '' ) ? 'padding-bottom:' . (int) esc_attr( $portfolio_settings['padding_bottom'] ) . 'px;' : '';
					$padding_left   = ( isset( $portfolio_settings['padding_left'] ) && $portfolio_settings['padding_left'] != '' ) ? 'padding-left:' . (int) esc_attr( $portfolio_settings['padding_left'] ) . 'px;' : '';

					if ( ! empty( $padding_top ) || ! empty( $padding_right ) || ! empty( $padding_bottom ) || ! empty( $padding_left ) ) {
						$styling .= '.archive .fw-portfolio-2 .fw-portfolio-description{' . $padding_top . $padding_right . $padding_bottom . $padding_left . '}';
					}

					//show btn
					if ( isset( $portfolio_settings['show_bnt'] ) ) {
						if ( $portfolio_settings['show_bnt'] == 'yes' ) {
							$btn = $portfolio_settings['button_options'];

							if ( isset( $btn['style']['selected'] ) ) {
								if ( $btn['style']['selected'] == 'fw-btn-3' ) {
									if ( isset( $btn['style']['fw-btn-3']['border_size'] ) && ! empty( $btn['style']['fw-btn-3']['border_size'] ) ) {
										$styling .= '.archive .fw-btn{ border-top-width: ' . (int) $btn['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int) $btn['style']['fw-btn-3']['border_size'] . 'px; }';
									}
									// btn color
									if ( isset( $btn['normal_color'] ) ) {
										$normal_color = the_core_get_color_palette_color_and_class( $btn['normal_color'], array( 'return_color' => true ) );
										if ( ! empty( $normal_color['color'] ) ) {
											$styling .= '.archive .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
										}
									}
									// hover color
									if ( isset( $btn['hover_color'] ) ) {
										$hover_color = the_core_get_color_palette_color_and_class( $btn['hover_color'], array( 'return_color' => true ) );
										if ( ! empty( $hover_color['color'] ) ) {
											$styling .= '.archive .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
										}
									}
								} elseif ( $btn['style']['selected'] == 'fw-btn-2' ) {
									if ( isset( $btn['style']['fw-btn-2']['border_size'] ) && ! empty( $btn['style']['fw-btn-2']['border_size'] ) ) {
										$styling .= '.archive .fw-btn{ border-width: ' . (int) $btn['style']['fw-btn-2']['border_size'] . 'px; }';
									}
									if ( isset( $btn['style']['fw-btn-2']['border_radius'] ) && ! empty( $btn['style']['fw-btn-2']['border_radius'] ) ) {
										$styling .= '.archive .fw-btn{ border-radius: ' . (int) $btn['style']['fw-btn-2']['border_radius'] . 'px; }';
									}

									// btn color
									if ( isset( $btn['normal_color'] ) ) {
										$normal_color = the_core_get_color_palette_color_and_class( $btn['normal_color'], array( 'return_color' => true ) );
										if ( ! empty( $normal_color['color'] ) ) {
											$styling .= '.archive .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
										}
									}
									// hover color
									if ( isset( $btn['hover_color'] ) ) {
										$hover_color = the_core_get_color_palette_color_and_class( $btn['hover_color'], array( 'return_color' => true ) );
										if ( ! empty( $hover_color['color'] ) ) {
											$styling .= '.archive .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
										}
									}
                                } elseif ( $btn['style']['selected'] == 'fw-btn-1' ) {
									if ( isset( $btn['style']['fw-btn-1']['border_radius'] ) && ! empty( $btn['style']['fw-btn-1']['border_radius'] ) ) {
										$styling .= '.archive .fw-btn{ border-radius: ' . (int) $btn['style']['fw-btn-1']['border_radius'] . 'px; }';
									}

									// btn color
									if ( isset( $btn['normal_color'] ) ) {
										$normal_color = the_core_get_color_palette_color_and_class( $btn['normal_color'], array( 'return_color' => true ) );
										if ( ! empty( $normal_color['color'] ) ) {
											$styling .= '.archive .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
										}
									}
									// hover color
									if ( isset( $btn['hover_color'] ) ) {
										$hover_color = the_core_get_color_palette_color_and_class( $btn['hover_color'], array( 'return_color' => true ) );
										if ( ! empty( $hover_color['color'] ) ) {
											$styling .= '.archive .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
										}
									}

								}
							}

							// advanced styling
							if ( isset( $btn['label_advanced_styling'] ) ) {
								// text advanced styling
								$text_advanced_styling = the_core_get_shortcode_advanced_styles( $btn['label_advanced_styling']['text'], array( 'return_color' => true, 'general_options' => true ) );
								if ( ! empty( $text_advanced_styling['styles'] ) ) {
									$styling .= '.archive .fw-btn span {' . $text_advanced_styling['styles'] . '}';
								}
								// responsive text styling
								$text_responsive_styles = the_core_responsive_heading_styles( array( 'styles'   => $btn['label_advanced_styling']['text'], 'selector' => '.archive .fw-btn span' ) );
								if ( ! empty( $text_responsive_styles ) ) {
									$styling .= '@media(max-width:767px){' . $text_responsive_styles . '}';
								}

								// hover text color
								if ( isset( $btn['label_advanced_styling']['hover_text_color'] ) ) {
									$hover_text_color = the_core_get_color_palette_color_and_class( $btn['label_advanced_styling']['hover_text_color'], array( 'return_color' => true ) );
									if ( ! empty( $hover_text_color['color'] ) ) {
										$styling .= '.archive .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' }';
									}
								}
							}
						}
					}
				}
			} //portfolio for style 3
			elseif ( $selected_portfolio == 'style3' ) {
				$portfolio = $the_core_settings_option['portfolio_style']['style3'];

				if ( isset( $portfolio['style1_advanced_styling'] ) ) {
					$portfolio_settings = $portfolio['style1_advanced_styling'];

					//title styling
					if ( isset( $portfolio_settings['title'] ) ) {
						$title = the_core_get_shortcode_advanced_styles( $portfolio_settings['title'], array( 'return_color' => true, 'general_options' => true ) );
						if ( ! empty( $title['styles'] ) ) {
							$styling .= '.archive .fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-portfolio-title{' . $title['styles'] . '}';
						}
						// responsive title styling
						$title_responsive_styles = the_core_responsive_heading_styles( array( 'styles'   => $portfolio_settings['title'], 'selector' => '.archive .fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-portfolio-title' ) );
						if ( ! empty( $title_responsive_styles ) ) {
							$styling .= '@media(max-width:767px){' . $title_responsive_styles . '}';
						}
					}
					//subtitle styling
					if ( isset( $portfolio_settings['subtitle'] ) ) {
						$subtitle = the_core_get_shortcode_advanced_styles( $portfolio_settings['subtitle'], array( 'return_color' => true, 'general_options' => true ) );
						if ( ! empty( $subtitle['styles'] ) ) {
							$styling .= '.archive .fw-portfolio-3 .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description{' . $subtitle['styles'] . '}';
						}
						// responsive subtitle styling
						$subtitle_responsive_styles = the_core_responsive_heading_styles( array( 'styles'   => $portfolio_settings['subtitle'], 'selector' => '.archive .fw-portfolio-3 .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description' ) );
						if ( ! empty( $subtitle_responsive_styles ) ) {
							$styling .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
						}
					}

					//hover background color
					if ( isset( $portfolio_settings['hover_bg_color'] ) ) {
						$hover_bg_color   = the_core_get_color_palette_color_and_class( $portfolio_settings['hover_bg_color'], array( 'return_color' => true ) );
						$hover_bg_opacity = isset( $portfolio_settings['opacity_bg_color'] ) && ! empty( $portfolio_settings['opacity_bg_color'] ) ? ( $portfolio_settings['opacity_bg_color'] / 100 ) : false;

						if ( ! empty( $hover_bg_color['color'] ) ) {
							$styling .= '.archive .fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay:hover{background-color:' . the_core_hex2rgba( $hover_bg_color['color'], $hover_bg_opacity ) . '}';
						}
					}

					//icon prettyphoto color
					if ( isset( $portfolio_settings['prettyphoto_icon_type'] ) ) {
						$icon_type = $portfolio_settings['prettyphoto_icon_type'];

						if ( $icon_type['tab_icon'] == 'icon-class' ) {
							//icon color
							$pretty_icon_color = the_core_get_color_palette_color_and_class( $icon_type['icon-class']['pretty_icon_color'], array( 'return_color' => true ) );

							if ( ! empty( $pretty_icon_color['color'] ) ) {
								$styling .= '.archive .fw-portfolio-3 .fw-block-image-icons a{color:' . $pretty_icon_color['color'] . ';border-color:' . $pretty_icon_color['color'] . ';}
								.archive .fw-portfolio-3 .fw-block-image-icons a:hover{color: #edf1f2;background: ' . $pretty_icon_color['color'] . ';}';
							}

							//icon hover color
							$pretty_icon_color_hover = the_core_get_color_palette_color_and_class( $icon_type['icon-class']['icon_color_hover'], array( 'return_color' => true ) );

							if ( ! empty( $pretty_icon_color_hover['color'] ) ) {
								$styling .= '.archive .fw-portfolio-3 .fw-block-image-icons a:hover{color: ' . $pretty_icon_color_hover['color'] . ';}';
							}

							$styling .= ! empty( $portfolio_settings['icon_size'] ) ? '.archive .fw-portfolio-3 .fw-block-image-icons a
						{
							font-size:' . esc_attr( (int) $portfolio_settings['icon_size'] ) . 'px;
							width:' . esc_attr( ( (int) $portfolio_settings['icon_size'] + 30 ) ) . 'px;
							height:' . esc_attr( ( (int) $portfolio_settings['icon_size'] + 30 ) ) . 'px;
							line-height:' . esc_attr( ( (int) $portfolio_settings['icon_size'] + 30 ) ) . 'px;
						}' : '';
						} else {
							if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
								//get image size
								$styling .= ! empty( $portfolio_settings['icon_size'] ) ? '.archive .fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{width:' . esc_attr( (int) $portfolio_settings['icon_size'] ) . 'px; height:' . esc_attr( (int) $portfolio_settings['icon_size'] ) . 'px;}' : '';
								$styling .= '.archive .fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{border:none;}
								.archive .fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class:hover{background:none;border:none;}';
							}
						}
					}

					//icon link color
					if ( isset( $portfolio_settings['link_icon_type'] ) ) {
						$icon_type = $portfolio_settings['link_icon_type'];

						if ( $icon_type['tab_icon'] == 'icon-class' ) {
							//icon color
							$link_icon_color = the_core_get_color_palette_color_and_class( $icon_type['icon-class']['link_icon_color'], array( 'return_color' => true ) );

							if ( ! empty( $link_icon_color['color'] ) ) {
								$styling .= '.archive .fw-portfolio-3 .fw-block-image-icons a.fw-link-icon{color:' . $link_icon_color['color'] . ';border-color:' . $link_icon_color['color'] . ';}
								.archive .fw-portfolio-3 .fw-block-image-icons a.fw-link-icon:hover{color: #edf1f2;background: ' . $link_icon_color['color'] . ';}';
							}

							//icon hover color
							$link_icon_color_hover = the_core_get_color_palette_color_and_class( $icon_type['icon-class']['link_icon_color_hover'], array( 'return_color' => true ) );

							if ( ! empty( $link_icon_color_hover['color'] ) ) {
								$styling .= '.archive .fw-portfolio-3 .fw-block-image-icons a.fw-link-icon:hover{color: ' . $link_icon_color_hover['color'] . ';}';
							}

							//icon size
							$styling .= ! empty( $portfolio_settings['icon_size2'] ) ? '.archive .fw-portfolio-3 .fw-block-image-icons a.fw-link-icon{
							font-size:' . esc_attr( (int) $portfolio_settings['icon_size2'] ) . 'px;
							width:' . esc_attr( ( (int) $portfolio_settings['icon_size2'] + 30 ) ) . 'px;
							height:' . esc_attr( ( (int) $portfolio_settings['icon_size2'] + 30 ) ) . 'px;
							line-height:' . esc_attr( ( (int) $portfolio_settings['icon_size2'] + 30 ) ) . 'px;
						}' : '';
						} else {
							if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
								//get image size
								$styling .= ! empty( $portfolio_settings['icon_size2'] ) ? '.archive .fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{width:' . esc_attr( (int) $portfolio_settings['icon_size2'] ) . 'px; height:' . esc_attr( (int) $portfolio_settings['icon_size2'] ) . 'px;}' : '';
								$styling .= '.archive .fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{border:none;}
								.archive .fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class:hover{background:none;border:none;}';
							}
						}
					}
				}
			}
		}
		return $styling;
	}
endif;


if ( ! function_exists( 'the_core_general_styles' ) ) :
	/**
	 * General styles
	 */
	function the_core_general_styles() {
		$styling = '';
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$the_core_general_settings = fw_get_db_settings_option();

			// custom section density
			if ( $the_core_general_settings['section_spacing'] != 'fw-section-space-sm' && $the_core_general_settings['section_spacing'] != 'fw-section-space-md' && $the_core_general_settings['section_spacing'] != 'fw-section-space-lg' ) {
				$styling .= '.fw-custom-section-density .fw-main-row-custom .fw-container, .fw-custom-section-density .fw-main-row .fw-container, .fw-custom-section-density .fw-main-row-custom .fw-container-fluid, .fw-custom-section-density .fw-main-row .fw-container-fluid {    padding-top: '.(int)$the_core_general_settings['section_spacing'].'px; padding-bottom: '.(int)$the_core_general_settings['section_spacing'].'px;}';
			}
		}

		return $styling;
	}
endif;


if( !function_exists('the_core_go_to_top_button') ) :
	/**
	 * Display go to top button
	 */
	function the_core_go_to_top_button(){
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$the_core_settings_option = fw_get_db_settings_option();

			if( isset($the_core_settings_option['scroll_to_top_styling']) ) {
				$icon = '';
				if ( $the_core_settings_option['scroll_to_top_styling']['icon-type']['icon-box-img'] == 'icon-class' ) {
					$icon = '<i class="' . $the_core_settings_option['scroll_to_top_styling']['icon-type']['icon-class']['icon_class'] . '"></i>';
				} elseif ( $the_core_settings_option['scroll_to_top_styling']['icon-type']['icon-box-img'] == 'upload-icon' && isset( $the_core_settings_option['scroll_to_top_styling']['icon-type']['upload-icon']['upload-custom-img']['url'] ) ) {
					$icon = '<img src="' . the_core_change_original_link_with_cdn( $the_core_settings_option['scroll_to_top_styling']['icon-type']['upload-icon']['upload-custom-img']['url'] ) . '" alt="to top button" />';
				}

				if ( isset( $the_core_settings_option['enable_scroll_to'] ) && $the_core_settings_option['enable_scroll_to'] == 'yes' ) : ?>
					<a class="scroll-to-top anchor <?php echo esc_attr($the_core_settings_option['scroll_to_top_styling']['icon-type']['icon-box-img']); ?>" href="#page"><?php echo ($icon); ?></a>
				<?php endif;
			}
		}
	}
endif;


if( !function_exists('the_core_blog_grid_separator_number') ) :
    /**
     * Return the number of items for separator
     * @param string $the_core_sidebar_position
     */
    function the_core_blog_grid_separator_number($the_core_sidebar_position){
        if( $the_core_sidebar_position == 'full' || $the_core_sidebar_position == null ) {
            return 3;
        }
        else {
            return 2;
        }
    }
endif;


if( !function_exists('the_core_replace_http') ) :
    /**
     * Replace http with empty string in a URL
     * @param string $url
     */
    function the_core_replace_http($url) {
        $url = trim($url);
        $url = trim($url, "/");

		return preg_replace("(^https?://)", "", $url );
    }
endif;


if( !function_exists('the_core_change_original_link_with_cdn') ) :
    /**
     * Replace original link with a CDN link
     * @param string $url
     */
    function the_core_change_original_link_with_cdn($url) {
        $final_url = $url;
        if( class_exists('WpFastestCache') ) {
            // for Wp Fastest Cache
            $cdn_values = get_option("WpFastestCacheCDN");
            if ($cdn_values) {
                $std = json_decode($cdn_values);

                $std->originurl = trim($std->originurl);
                $std->originurl = trim($std->originurl, "/");
                $std->originurl = preg_replace("/http(s?)\:\/\/(www\.)?/i", "", $std->originurl);

                $std->cdnurl = trim($std->cdnurl);
                $std->cdnurl = trim($std->cdnurl, "/");

                // remove http from CDN url
                $std->cdnurl = the_core_replace_http($std->cdnurl);

                // remove http from original url
                $url = the_core_replace_http($url);

                $final_url = '//' . str_replace($std->originurl, $std->cdnurl, $url);
            }
        }
        elseif( function_exists('wp_cache_add_pages') ) {
            global $ossdlcdn;
            if( $ossdlcdn ) {
                $siteurl = the_core_replace_http( get_option('siteurl') );

                $ossdl_off_cdn_url = get_option('ossdl_off_cdn_url');
                // remove http from CDN url
                $ossdl_off_cdn_url = the_core_replace_http($ossdl_off_cdn_url);

                // remove http from original url
                $url = the_core_replace_http($url);

                $final_url = '//' . str_replace($siteurl, $ossdl_off_cdn_url, $url);
            }
        }

        return $final_url;
    }
endif;


if( !function_exists('the_core_post_type_3_date') ) :
    /**
     * Post date for blog type 3
     * @param string $the_core_permalink
     * @param array $atts
     */
    function the_core_post_type_3_date($the_core_permalink, $atts = array() ) { ?>
    <?php $post_date = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings/post_date', '' ) : '';
    if( isset($atts['extra_options']['post_date']) ) {
        $post_date = $atts['extra_options']['post_date'];
    }
    if ( $post_date != 'no' ) : ?>
        <div class="wrap-entry-meta">
			<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="https://google.com/article" content="" />
            <span class="entry-date">
                <a rel="bookmark" href="<?php echo esc_url($the_core_permalink); ?>">
                    <time itemprop="datePublished" datetime="<?php the_core_get_datetime_attribute(); ?>"><?php echo get_the_date(); ?></time>
                </a>
                <meta itemprop="dateModified" content="<?php the_core_get_modified_date_attribute(); ?>">
            </span>
        </div>
    <?php endif;
    }
endif;


if( !function_exists('the_core_post_type_3_categories') ) :
    /**
     * Post categories for blog type 3
     * @param int $post_id
     * @param array $atts
     */
    function the_core_post_type_3_categories($post_id, $atts = array() ) { ?>
        <?php $post_categories = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings/post_categories', '' ) : '';
        if( isset($atts['extra_options']['post_date']) ) {
            $post_categories = $atts['extra_options']['post_categories'];
        }
        if ( $post_categories != 'no' ) : ?>
            <span class="cat-links"><?php echo get_the_term_list($post_id , 'category', '', '', '' ); ?></span>
            <div class="entry-content-divider">
                <span class="divider-item"></span>
                <span class="divider-item"></span>
                <span class="divider-item"></span>
            </div>
        <?php endif; ?>
    <?php }
endif;


if( !function_exists('the_core_return_taxonomies_with_posts') ) :
    /**
     * Return taxonomies ids that have posts
     *
     * @param array $posts Array of posts
     * @param array $atts Array of attributes
     */
    function the_core_return_taxonomies_with_posts($posts, $atts = array('taxonomy' => '' ) ) {
        $final_array = array();
        if( !empty($posts) ) {
            foreach($posts as $post) {
                $terms = wp_get_post_terms( $post->ID, $atts['taxonomy'] );
                foreach ( $terms as $term ) {
                    if( !in_array($term->term_id, $final_array) ){
                        $final_array[] = $term->term_id;
                    }
                }
            }
        }

        return $final_array;
    }
endif;


if( !function_exists('the_core_events_price_and_currency') ) :
    /**
     * Display events price and currency
     *
     * @param array $options Array of options
     * @param array $atts Array of attributes
     */
    function the_core_events_price_and_currency($options, $atts = array('ticket_price' => '') ) { ?>
        <?php if( $options['events_currency_position'] == 'left' ) : ?>
            <span class="ticket-price-symbol"><?php echo esc_attr($options['events_currency_symbol']); ?></span><?php echo esc_attr($atts['ticket_price']); ?>
        <?php else: ?>
            <?php echo esc_attr($atts['ticket_price']); ?><span class="ticket-price-symbol"><?php echo esc_attr($options['events_currency_symbol']); ?></span>
        <?php endif; ?>
    <?php }
endif;


if( !function_exists('the_core_get_blog_title') ) :
    /**
     * Blog title
     *
     * @param array $atts Array of attributes
     */
    function the_core_get_blog_title( $atts = array( 'extra_options' => array() ) ) {
        if( !empty( $atts['extra_options'] ) ) {
            $blog_title = $atts['extra_options']['blog_title']['selected'];
        }
        else {
            $blog_title = (function_exists('fw_get_db_settings_option')) ? fw_get_db_settings_option('posts_settings/blog_title/selected', 'h2') : 'h2';
        }
        return $blog_title;
    }
endif;


if( !function_exists('the_core_post_type_3_author') ) :
    /**
     * Blog type 3 author
     *
     * @param array $atts Array of attributes
     */
    function the_core_post_type_3_author( $atts = array( 'extra_options' => array() ) ) {
        if( isset($atts['extra_options']['post_author']) && !empty($atts['extra_options']['post_author']) ) {
            $post_author = $atts['extra_options']['post_author'];
        }
        else {
            $post_author = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings/post_author', '' ) : '';
        }
        return $post_author;
    }
endif;


if( !function_exists('the_core_post_type_3_comments_number') ) :
    /**
     * Blog type 3 comments number
     *
     * @param array $atts Array of attributes
     */
    function the_core_post_type_3_comments_number( $atts = array( 'extra_options' => array() ) ) {
        if( isset($atts['extra_options']['display_comments_number']) && !empty($atts['extra_options']['display_comments_number']) ) {
            $comments_number = $atts['extra_options']['display_comments_number'];
        }
        else {
            $comments_number = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings/display_comments_number' ) : '';
        }
        return $comments_number;
    }
endif;


if( ! function_exists( 'the_core_nav_menu_without_mega_menu' ) ) :
	/**
	 * Return the menu without mega menu
	 */
	function the_core_nav_menu_without_mega_menu( $location ) {
		return wp_nav_menu( array(
			'depth'           => 4,
			'echo'            => false,
			'container'       => 'mobile-menu', /* important this is used in custom walker */
			'container_id'    => $location.'-fw-mm-menu-container',
			'container_class' => $location.'-fw-mm-menu-container',
			'menu_id'         => $location.'-fw-mm-menu',
			'menu_class'      => $location.'-fw-mm-menu',
			'theme_location'  => $location,
			'walker'          => new The_Core_Mobile_Menu_Walker(),
			'fallback_cb'     => false,
		) );
	}
endif;


if( ! function_exists( 'the_core_mobile_menu' ) ) :
	/**
	 * Mobile menu
	 */
	function the_core_mobile_menu() {
		$the_core_header_settings = defined( 'FW' ) ? fw_get_db_settings_option( 'header_settings' ) : array();
		$the_core_secondary_menu  = '';

		if( isset( $the_core_header_settings['header_type_picker']['header_type'] ) && $the_core_header_settings['header_type_picker']['header_type'] == 'header-2' ) {
			// secondary menu (only for header type 2)
			$the_core_secondary_menu = the_core_nav_menu_without_mega_menu( 'secondary' );
			$the_core_secondary_menu = preg_replace('/^<ul[^>]+>/', '', str_replace("\n", '', $the_core_secondary_menu));
			$the_core_secondary_menu = preg_replace('/<\/ul>$/', '', str_replace("\n", '', $the_core_secondary_menu));
		}

		// primary menu
		$the_core_primary_menu = the_core_nav_menu_without_mega_menu( 'primary' );
		$the_core_primary_menu = preg_replace('/^<ul[^>]+>/', '', str_replace("\n", '', $the_core_primary_menu));
		$the_core_primary_menu = preg_replace('/<\/ul>$/', '', str_replace("\n", '', $the_core_primary_menu));

		echo '<nav id="mobile-menu"><ul>'.$the_core_primary_menu.$the_core_secondary_menu.'</ul></nav>';
	}
endif;


if( !function_exists('the_core_adjustColorLightenDarken') ) :
	/**
	 * @param $color_code
	 * @param int $percentage_adjuster
	 * @return array|string
	 */
	function the_core_adjustColorLightenDarken($color_code,$percentage_adjuster = 0) {
		$percentage_adjuster = round($percentage_adjuster/100,2);
		if(is_array($color_code)) {
			$r = $color_code["r"] - (round($color_code["r"])*$percentage_adjuster);
			$g = $color_code["g"] - (round($color_code["g"])*$percentage_adjuster);
			$b = $color_code["b"] - (round($color_code["b"])*$percentage_adjuster);

			return array("r"=> round(max(0,min(255,$r))),
				"g"=> round(max(0,min(255,$g))),
				"b"=> round(max(0,min(255,$b))));
		}
		else if(preg_match("/#/",$color_code)) {
			$hex = str_replace("#","",$color_code);
			$r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
			$g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
			$b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
			$r = round($r - ($r*$percentage_adjuster));
			$g = round($g - ($g*$percentage_adjuster));
			$b = round($b - ($b*$percentage_adjuster));

			return "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
				.str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
				.str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);
		}
		else {
			return $color_code;
		}
	}
endif;


if( !function_exists('the_core_transition_in') ) :
	/**
	 * Return an array of key values for transition In
	 */
	function the_core_transition_in() {
		return array(
			'fadeIn'         => esc_html__( 'fadeIn', 'the-core' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'the-core' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'the-core' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'the-core' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'the-core' ),
		);
	}
endif;


if( !function_exists('the_core_transition_out') ) :
	/**
	 * Return an array of key values for transition Out
	 */
	function the_core_transition_out() {
		return array(
			'fadeOut'         => esc_html__( 'fadeOut', 'the-core' ),
			'fadeOutDown'     => esc_html__( 'fadeOutDown', 'the-core' ),
			'fadeOutLeft'     => esc_html__( 'fadeOutLeft', 'the-core' ),
			'fadeOutRight'    => esc_html__( 'fadeOutRight', 'the-core' ),
			'fadeOutUp'       => esc_html__( 'fadeOutUp', 'the-core' ),
		);
	}
endif;


if( !function_exists('the_core_page_transition_loader') ) :
	/**
	 * Display the page transition loader
	 */
	function the_core_page_transition_loader() {
		$the_core_settings_option = defined( 'FW' ) ? fw_get_db_settings_option() : array();
		if( empty($the_core_settings_option) ) {
			return;
		}

		$page_transition = isset($the_core_settings_option['page_transition']) ? $the_core_settings_option['page_transition'] : 'no';
		if( $page_transition == 'yes' ) :
			if( isset($the_core_settings_option['spinner_styling']) && !empty($the_core_settings_option['spinner_styling']) ) {
				$spinner_type = apply_filters( 'the_core_page_loader_type', $the_core_settings_option['spinner_styling']['spinner_type']['selected'] );

				echo '<div class="fw-page-transition-spinner '.$spinner_type.'">';
				switch($spinner_type) {
					case "fw-spinner-double-bounce" :
						echo '<div class="fw-spinner-double-bounce1"></div>
						<div class="fw-spinner-double-bounce2"></div>';
					break;
					case "fw-spinner-rect" :
						echo '<div class="fw-spinner-rect1"></div>
						<div class="fw-spinner-rect2"></div>
						<div class="fw-spinner-rect3"></div>
						<div class="fw-spinner-rect4"></div>
						<div class="fw-spinner-rect5"></div>';
					break;
					case "fw-spinner-cube-move" :
						echo '<div class="fw-spinner-cube-move1"></div>
						<div class="fw-spinner-cube-move2"></div>';
					break;
					case "fw-spinner-dot-rotate" :
						echo '<div class="fw-spinner-dot-rotate1"></div>
						<div class="fw-spinner-dot-rotate2"></div>';
					break;
					case "fw-spinner-bounce-delay" :
						echo '<div class="fw-spinner-bounce-delay1"></div>
						<div class="fw-spinner-bounce-delay2"></div>
						<div class="fw-spinner-bounce-delay3"></div>';
					break;
					case "fw-spinner-circle" :
						echo '<div class="fw-spinner-circle1"></div>
						<div class="fw-spinner-circle2"></div>
						<div class="fw-spinner-circle3"></div>
						<div class="fw-spinner-circle4"></div>
						<div class="fw-spinner-circle5"></div>
						<div class="fw-spinner-circle6"></div>
						<div class="fw-spinner-circle7"></div>
						<div class="fw-spinner-circle8"></div>
						<div class="fw-spinner-circle9"></div>
						<div class="fw-spinner-circle10"></div>
						<div class="fw-spinner-circle11"></div>
						<div class="fw-spinner-circle12"></div>';
					break;
					case "fw-spinner-cube-grid" :
						echo '<div class="fw-spinner-cube-grid1"></div>
						<div class="fw-spinner-cube-grid2"></div>
						<div class="fw-spinner-cube-grid3"></div>
						<div class="fw-spinner-cube-grid4"></div>
						<div class="fw-spinner-cube-grid5"></div>
						<div class="fw-spinner-cube-grid6"></div>
						<div class="fw-spinner-cube-grid7"></div>
						<div class="fw-spinner-cube-grid8"></div>
						<div class="fw-spinner-cube-grid9"></div>';
					break;
					case "fw-spinner-cube" :
						echo '<div class="fw-spinner-cube1"></div>
						<div class="fw-spinner-cube2"></div>
						<div class="fw-spinner-cube4"></div>
						<div class="fw-spinner-cube3"></div>';
					break;
					case "custom" :
						echo apply_filters('the_core_page_loader_type_custom', '');
					break;
				}
				echo '</div>';
			}
		endif;
	}
endif;


if( !function_exists('the_core_page_transition_begin') ) :
	/**
	 * Display the begin code for page transition
	 */
	function the_core_page_transition_begin() {
		$the_core_settings_option = defined( 'FW' ) ? fw_get_db_settings_option() : array();
		if( empty($the_core_settings_option) ) {
			return;
		}

		$transition_in   = $duration_in = $transition_out = $duration_out = '';
		$page_transition = isset($the_core_settings_option['page_transition']) ? $the_core_settings_option['page_transition'] : 'no';
		if( isset($the_core_settings_option['spinner_styling']) && !empty($the_core_settings_option['spinner_styling']) ) {
			$transition_in  = $the_core_settings_option['spinner_styling']['transition_in'];
			$duration_in    = $the_core_settings_option['spinner_styling']['duration_in'];
			$transition_out = $the_core_settings_option['spinner_styling']['transition_out'];
			$duration_out   = $the_core_settings_option['spinner_styling']['duration_out'];
		}

		if( $page_transition == 'yes' ) :
			echo '<div class="fw-page-transition" data-page-transition-in="'.$transition_in.'" data-page-transition-duration-in="'.$duration_in.'" data-page-transition-out="'.$transition_out.'" data-page-transition-duration-out="'.$duration_out.'">';
		endif;
	}
endif;


if( !function_exists('the_core_page_transition_end') ) :
	/**
	 * Display the end code for page transition
	 */
	function the_core_page_transition_end() {
		$page_transition = defined( 'FW' ) ? fw_get_db_settings_option( 'page_transition', 'no' ) : '';
		if( empty($page_transition) ) {
			return;
		}

		if( $page_transition == 'yes' ) :
			echo '</div><!-- /.fw-page-transition -->';
		endif;
	}
endif;


if( !function_exists('the_core_server_protocol') ) :
	/**
	 * Return the server protocol
	 */
	function the_core_server_protocol() {
		return isset( $_SERVER["HTTPS"] ) ? 'https:' : 'http:';
	}
endif;


if ( ! function_exists( 'the_core_url_without_protocol' ) ) :
	/**
	 * Return the URL without protocol
	 */
	function the_core_url_without_protocol( $url ) {
		if ( ! apply_filters( 'filter_the_core_url_without_protocol', true ) ) {
			return $url;
		}

		if ( strpos( $url, 'https://' ) ) {
			$final_url = str_replace( "https:", "", $url );
		} else {
			$final_url = str_replace( "http:", "", $url );
		}

		return $final_url;
	}
endif;


if( !function_exists('the_core_logo_url') ) :
	/**
	 * Display logo URL
	 */
	function the_core_logo_url() {
		if ( !defined( 'FW' ) ) {
			return;
		}
		$the_core_logo_settings = fw_get_db_settings_option( 'logo_settings' );
		if( $the_core_logo_settings['logo']['selected_value'] == 'image' && isset($the_core_logo_settings['logo']['image']['image_logo']['url']) ) {
			echo the_core_server_protocol().esc_url( $the_core_logo_settings['logo']['image']['image_logo']['url'] );
		}
	}
endif;


if( !function_exists('the_core_check_external_booking_url') ) :
	/**
	 * Check the external booking url (for booking.com and others)
	 */
	function the_core_check_external_booking_url( $url_initial, $platform ) {
		if ( !defined( 'FW' ) || empty($url_initial) || $url_initial == '#' || $platform == 'custom' ) {
			return $url_initial;
		}

		if( strpos( $url_initial, 'hotels.com' ) ) {
			$url = parse_url($url_initial);
			parse_str($url['query'], $output);
			if( isset($url['scheme']) ) {
				return $url['scheme'] . '://' . $url['host'] . $url['path'] . '?hotel-id=' . $output['hotel-id'];
			}
		}
		else {
			$url = parse_url($url_initial);
			if( isset($url['scheme']) ) {
				return $url['scheme'] . '://' . $url['host'] . $url['path'];
			}
		}

		return $url_initial;
	}
endif;


function the_core_old_plugins_list_for_update() {
	return array(
		array(
			'name'   => 'Smart Slider 3 Pro',
			'slug'   => 'nextend-smart-slider3-pro',
			'source' => 'http://updates.themefuse.com/plugins/nextend-smart-slider3-pro.zip'
		),
		array(
			'name'   => 'Slider Revolution',
			'slug'   => 'revslider',
			'source' => 'http://updates.themefuse.com/plugins/revslider.zip'
		),
		array(
			'name'   => 'LayerSlider WP',
			'slug'   => 'LayerSlider',
			'source' => 'http://updates.themefuse.com/plugins/LayerSlider.zip'
		),
	);
}


