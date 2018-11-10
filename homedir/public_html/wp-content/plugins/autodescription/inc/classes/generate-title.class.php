<?php
/**
 * @package The_SEO_Framework\Classes
 */
namespace The_SEO_Framework;

defined( 'THE_SEO_FRAMEWORK_PRESENT' ) or die;

/**
 * The SEO Framework plugin
 * Copyright (C) 2015 - 2018 Sybre Waaijer, CyberWire (https://cyberwire.nl/)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 3 as published
 * by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Class The_SEO_Framework\Generate_Title
 *
 * Generates title SEO data based on content.
 *
 * @since 2.8.0
 */
class Generate_Title extends Generate_Description {

	/**
	 * Returns the meta title from custom fields. Falls back to autogenerated title.
	 *
	 * @since 3.1.0
	 * @uses $this->get_custom_field_title()
	 * @uses $this->get_generated_title()
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 *                           Leave null to autodetermine query.
	 * @param bool       $escape Whether to escape the title.
	 * @return string The real title output.
	 */
	public function get_title( $args = null, $escape = true ) {

		$title = $this->get_custom_field_title( $args )
			  ?: $this->get_generated_title( $args, false );

		return $escape ? $this->escape_title( $title ) : $title;
	}

	/**
	 * Returns the custom user-inputted title.
	 *
	 * @since 3.1.0
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 *                           Leave null to autodetermine query.
	 * @param bool       $escape Whether to escape the title.
	 * @return string The custom field title.
	 */
	public function get_custom_field_title( $args = null, $escape = true ) {

		/**
		 * Filters the title from custom field, if any.
		 *
		 * @since 3.1.0
		 *
		 * @param string $title The title.
		 * @param array  $args  The title arguments.
		 */
		$title = (string) \apply_filters_ref_array( 'the_seo_framework_title_from_custom_field', [
			$this->get_raw_custom_field_title( $args ),
			$args,
		] );

		if ( $title ) {
			//? Only add protection if the query is autodetermined, and on a real page.
			$this->merge_title_protection( $title, $args );
			if ( null === $args
				&& ! ( $this->is_404() || $this->is_admin() ) ) {
				$this->merge_title_pagination( $title );
			}

			if ( $this->use_title_branding( $args ) ) {
				$this->merge_title_branding( $title, $args );
			}
		}

		return $escape ? $this->escape_title( $title ) : $title;
	}

	/**
	 * Returns the autogenerated meta title.
	 *
	 * @since 3.1.0
	 * @uses $this->s_title_raw() : This is the same method used to prepare custom title on save.
	 * @uses $this->build_generated_title()
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 *                           Leave null to autodetermine query.
	 * @param bool       $escape Whether to escape the title.
	 * @return string The generated title output.
	 */
	public function get_generated_title( $args = null, $escape = true ) {

		/**
		 * Filters the title from query.
		 *
		 * @NOTE: This filter doesn't consistently run on the SEO Settings page.
		 *        You might want to avoid this filter on the home page.
		 * @since 3.1.0
		 * @param string $title The title.
		 * @param array  $args  The title arguments.
		 */
		$title = (string) \apply_filters_ref_array( 'the_seo_framework_title_from_generation', [
			$this->get_raw_generated_title( $args ),
			$args,
		] );

		$this->merge_title_protection( $title, $args );
		//? Only add protection if the query is autodetermined, and on a real page.
		if ( null === $args
			&& ! ( $this->is_404() || $this->is_admin() ) ) {
			$this->merge_title_pagination( $title );
		}

		if ( $this->use_title_branding( $args ) ) {
			$this->merge_title_branding( $title, $args );
		}

		$title = $this->s_title_raw( $title );

		return $escape ? $this->escape_title( $title ) : $title;
	}

	/**
	 * Returns the Twitter meta title.
	 * Falls back to Open Graph title.
	 *
	 * @since 3.0.4
	 * @since 3.1.0 : 1. The first parameter now expects an array.
	 *                2. Now tries to get the homepage social titles.
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 *                           Leave null to autodetermine query.
	 * @param bool       $escape Whether to escape the title.
	 * @return string Twitter Title.
	 */
	public function get_twitter_title( $args = null, $escape = true ) {

		$title = $this->get_twitter_title_from_custom_field( $args, false )
			  ?: $this->get_generated_twitter_title( $args, false );

		return $escape ? $this->escape_title( $title ) : $title;
	}

	/**
	 * Returns the Twitter meta title from custom field.
	 * Falls back to Open Graph title.
	 *
	 * @since 3.1.0
	 * @see $this->get_twitter_title()
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 * @param bool       $escape Whether to escape the title.
	 * @return string Twitter Title.
	 */
	protected function get_twitter_title_from_custom_field( $args, $escape ) {

		if ( null === $args ) {
			$title = $this->get_custom_twitter_title_from_query();
		} else {
			$this->fix_generation_args( $args );
			$title = $this->get_custom_twitter_title_from_args( $args );
		}

		return $escape ? $this->escape_title( $title ) : $title;
	}

	/**
	 * Returns the Twitter meta title from custom field, based on query.
	 * Falls back to Open Graph title.
	 *
	 * @since 3.1.0
	 * @see $this->get_twitter_title()
	 * @see $this->get_twitter_title_from_custom_field()
	 *
	 * @return string Twitter Title.
	 */
	protected function get_custom_twitter_title_from_query() {

		$title = '';

		if ( $this->is_real_front_page() ) {
			$title = $this->get_option( 'homepage_twitter_title' ) ?: $this->get_option( 'homepage_og_title' ) ?: '';
		}
		if ( ! $title ) {
			if ( $this->is_singular() ) {
				$title = $this->get_custom_field( '_twitter_title' )
					  ?: $this->get_custom_field( '_open_graph_title' )
					  ?: '';
			}
		}

		return $title;
	}

	/**
	 * Returns the Twitter meta title from custom field, based on arguments.
	 * Falls back to Open Graph title.
	 *
	 * @since 3.1.0
	 * @see $this->get_twitter_title()
	 * @see $this->get_twitter_title_from_custom_field()
	 *
	 * @param array|null $args The query arguments. Accepts 'id' and 'taxonomy'.
	 * @return string Twitter Title.
	 */
	protected function get_custom_twitter_title_from_args( array $args ) {

		$title = '';

		if ( $args['taxonomy'] ) {
			$title = '';
		} else {
			if ( $this->is_front_page_by_id( $args['id'] ) ) {
				$title = $this->get_option( 'homepage_twitter_title' ) ?: $this->get_option( 'homepage_og_title' ) ?: '';
			}
			if ( ! $title ) {
				$title = $this->get_custom_field( '_twitter_title', $args['id'] )
					  ?: $this->get_custom_field( '_open_graph_title', $args['id'] )
					  ?: '';
			}
		}

		return $title;
	}

	/**
	 * Returns the autogenerated Twitter meta title.
	 * Falls back to meta title.
	 *
	 * @since 3.0.4
	 * @since 3.1.0 The first parameter now expects an array.
	 * @uses $this->get_title()
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 *                           Leave null to autodetermine query.
	 * @param bool       $escape Whether to escape the title.
	 * @return string The generated Twitter Title.
	 */
	public function get_generated_twitter_title( $args = null, $escape = true ) {
		return $this->get_title( $args, $escape );
	}

	/**
	 * Returns the Open Graph meta title.
	 * Falls back to meta title.
	 *
	 * @since 3.0.4
	 * @since 3.1.0 : 1. The first parameter now expects an array.
	 *                2. Now tries to get the homepage social title.
	 * @uses $this->get_generated_open_graph_title()
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 *                           Leave null to autodetermine query.
	 * @param bool       $escape Whether to escape the title.
	 * @return string Open Graph Title.
	 */
	public function get_open_graph_title( $args = null, $escape = true ) {

		$title = $this->get_open_graph_title_from_custom_field( $args, false )
			  ?: $this->get_generated_open_graph_title( $args, false );

		return $escape ? $this->escape_title( $title ) : $title;
	}

	/**
	 * Returns the Open Graph meta title from custom field.
	 * Falls back to meta title.
	 *
	 * @since 3.1.0
	 * @see $this->get_open_graph_title()
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 * @param bool       $escape Whether to escape the title.
	 * @return string Open Graph Title.
	 */
	protected function get_open_graph_title_from_custom_field( $args, $escape ) {

		if ( null === $args ) {
			$title = $this->get_custom_open_graph_title_from_query();
		} else {
			$this->fix_generation_args( $args );
			$title = $this->get_custom_open_graph_title_from_args( $args );
		}

		return $escape ? $this->escape_title( $title ) : $title;
	}

	/**
	 * Returns the Twitter meta title from custom field, based on query.
	 * Falls back to meta title.
	 *
	 * @since 3.1.0
	 * @see $this->get_open_graph_title()
	 * @see $this->get_open_graph_title_from_custom_field()
	 *
	 * @return string Open Graph Title.
	 */
	protected function get_custom_open_graph_title_from_query() {

		$title = '';

		if ( $this->is_real_front_page() ) {
			$title = $this->get_option( 'homepage_og_title' ) ?: '';
		}
		if ( ! $title ) {
			if ( $this->is_singular() ) {
				$title = $this->get_custom_field( '_open_graph_title' ) ?: '';
			}
		}

		return $title;
	}

	/**
	 * Returns the Open Graph meta title from custom field, based on query.
	 * Falls back to meta title.
	 *
	 * @since 3.1.0
	 * @see $this->get_open_graph_title()
	 * @see $this->get_open_graph_title_from_custom_field()
	 *
	 * @param array|null $args The query arguments. Accepts 'id' and 'taxonomy'.
	 * @return string Open Graph Title.
	 */
	protected function get_custom_open_graph_title_from_args( array $args ) {

		$title = '';

		if ( $args['taxonomy'] ) {
			$title = '';
		} else {
			if ( $this->is_front_page_by_id( $args['id'] ) ) {
				$title = $this->get_option( 'homepage_og_title' ) ?: '';
			}
			if ( ! $title ) {
				$title = $this->get_custom_field( '_open_graph_title', $args['id'] ) ?: '';
			}
		}

		return $title;
	}

	/**
	 * Returns the autogenerated Open Graph meta title. Falls back to meta title.
	 * Falls back to meta title.
	 *
	 * @since 3.0.4
	 * @since 3.1.0 The first parameter now expects an array.
	 * @uses $this->get_title()
	 *
	 * @param array|null $args   The query arguments. Accepts 'id' and 'taxonomy'.
	 *                           Leave null to autodetermine query.
	 * @param bool       $escape Whether to escape the title.
	 * @return string The generated Open Graph Title.
	 */
	public function get_generated_open_graph_title( $args = null, $escape = true ) {
		return $this->get_title( $args, $escape );
	}

	/**
	 * Returns the custom user-inputted title.
	 *
	 * This doesn't use the taxonomy arguments, because, wonderously, WordPress
	 * finally admits through their code that terms can be queried using only IDs.
	 *
	 * @since 3.1.0
	 * @internal But, feel free to use it.
	 *
	 * @param array|null $args The query arguments. Accepts 'id' and 'taxonomy'.
	 *                         Leave null to autodetermine query.
	 * @return string The custom field title, if it exists.
	 */
	public function get_raw_custom_field_title( $args = null ) {

		$title = '';

		if ( null === $args ) {
			$title = $this->get_custom_field_title_from_query();
		} else {
			$this->fix_generation_args( $args );
			$title = $this->get_custom_field_title_from_args( $args );
		}

		return $title;
	}

	/**
	 * Gets a custom title, based on current query, without additions or prefixes.
	 *
	 * @since 3.1.0
	 * @internal
	 * @see $this->get_raw_custom_field_title()
	 *
	 * @return string The custom title.
	 */
	protected function get_custom_field_title_from_query() {

		$title = '';

		if ( $this->is_real_front_page() ) {
			$title = $this->get_option( 'homepage_title' ) ?: '';
		}
		if ( ! $title ) {
			if ( $this->is_singular() ) {
				$title = $this->get_custom_field( '_genesis_title' ) ?: '';
			} elseif ( $this->is_term_meta_capable() ) {
				$data  = $this->get_term_meta( $this->get_the_real_ID() );
				$title = ! empty( $data['doctitle'] ) ? $data['doctitle'] : '';
			}
		}

		return $title;
	}

	/**
	 * Gets a custom title, based on input arguments query, without additions or prefixes.
	 *
	 * @since 3.1.0
	 * @since 3.1.4 Now uses the 'id' to get custom singular title.
	 * @internal
	 * @see $this->get_raw_custom_field_title()
	 *
	 * @return string The custom title.
	 */
	protected function get_custom_field_title_from_args( array $args ) {

		$title = '';

		if ( $args['taxonomy'] ) {
			// $term = \get_term( $args['id'], $args['taxonomy'] ); // redundant
			$data  = $this->get_term_meta( $args['id'] );
			$title = ! empty( $data['doctitle'] ) ? $data['doctitle'] : '';
		} else {
			if ( $this->is_front_page_by_id( $args['id'] ) ) {
				$title = $this->get_option( 'homepage_title' ) ?: '';
			}
			$title = $title ?: $this->get_custom_field( '_genesis_title', $args['id'] ) ?: '';
		}

		return $title;
	}

	/**
	 * Generates a title, based on expected or current query, without additions or prefixes.
	 *
	 * @since 3.1.0
	 * @uses $this->generate_title_from_query()
	 * @uses $this->generate_title_from_args()
	 *
	 * @param array|null $args The query arguments. Accepts 'id' and 'taxonomy'.
	 *                         Leave null to autodetermine query.
	 * @return string The generated title.
	 */
	public function get_raw_generated_title( $args = null ) {

		$this->remove_default_title_filters();

		if ( null === $args ) {
			$title = $this->generate_title_from_query();
		} else {
			$this->fix_generation_args( $args );
			$title = $this->generate_title_from_args( $args );
		}

		$this->reset_default_title_filters();

		return $title ?: $this->get_static_untitled_title();
	}

	/**
	 * Removes default title filters, for consistent output and sanitation.
	 *
	 * @since 3.1.0
	 * @internal Only to be used within $this->get_raw_generated_title()
	 * @staticvar array $filtered An array containing removed filters.
	 * Peformance test: 0.000005s per remove+reset on PHP 7.2, single core VPN.
	 *
	 * @param bool $reset Whether to reset the removed filters
	 */
	protected function remove_default_title_filters( $reset = false ) {

		static $filtered = [];

		if ( $reset ) {
			foreach ( $filtered as $filter => $priorities ) {
				foreach ( $priorities as $priority => $functions ) {
					foreach ( $functions as $function ) {
						\add_filter( $filter, $function, $priority );
					}
				}
			}
			// Reset filters.
			$filtered = [];
		} else {
			$filters   = [ 'single_post_title', 'single_cat_title', 'single_tag_title' ];
			/**
			 * Texturization happens when outputting and saving the title; however,
			 * we want the raw title, so we won't find unexplainable issues later.
			 */
			$functions = [ 'wptexturize' ];

			// TODO: Is this the right location for this option check?
			if ( ! $this->get_option( 'title_strip_tags' ) ) {
				$functions[] = 'strip_tags';
			}

			foreach ( $filters as $filter ) {
				foreach ( $functions as $function ) {
					$it = 10;
					$i  = 0;
					while ( $priority = \has_filter( $filter, $function ) ) {
						$filtered[ $filter ][ $priority ][] = $function;
						\remove_filter( $filter, $function, $priority );
						// Some noob might've destroyed \WP_Hook. Safeguard.
						if ( ++$i > $it ) break 1;
					}
				}
			}
		}
	}

	/**
	 * Resets default title filters, for consistent output and sanitation.
	 *
	 * @since 3.1.0
	 * @internal Only to be used within $this->get_raw_generated_title()
	 * @uses $this->remove_default_title_filters()
	 */
	protected function reset_default_title_filters() {
		$this->remove_default_title_filters( true );
	}

	/**
	 * Generates a title, based on current query, without additions or prefixes.
	 *
	 * @since 3.1.0
	 * @internal
	 * @see $this->get_raw_generated_title()
	 *
	 * @return string The generated title.
	 */
	protected function generate_title_from_query() {

		$title = '';

		if ( $this->is_404() ) {
			$title = $this->get_static_404_title();
		} elseif ( $this->is_search() ) {
			$title = $this->get_generated_search_query_title();
		} elseif ( $this->is_real_front_page() ) {
			$title = $this->get_static_front_page_title();
		} elseif ( $this->is_archive() ) {
			$title = $this->get_generated_archive_title();
		} elseif ( $this->is_singular() ) {
			$title = $this->get_generated_single_post_title();
		}

		return $title;
	}

	/**
	 * Generates a title, based on expected query, without additions or prefixes.
	 *
	 * @since 3.1.0
	 * @internal
	 * @see $this->get_raw_generated_title()
	 *
	 * @param array $args The query arguments. Required. Accepts 'id' and 'taxonomy'.
	 * @return string The generated title. Empty if query can't be replicated.
	 */
	protected function generate_title_from_args( array $args ) {

		$title = '';

		if ( $args['taxonomy'] ) {
			$title = $this->get_generated_archive_title( \get_term( $args['id'], $args['taxonomy'] ) );
		} else {
			if ( $this->is_front_page_by_id( $args['id'] ) ) {
				$title = $this->get_static_front_page_title();
			} else {
				$title = $this->get_generated_single_post_title( $args['id'] );
			}
		}

		return $title;
	}

	/**
	 * Generates front page title.
	 *
	 * @since 3.1.0
	 *
	 * @return string The generated front page title.
	 */
	public function get_static_front_page_title() {
		return \get_bloginfo( 'name', 'raw' );
	}

	/**
	 * Returns the archive title. Also works in admin.
	 *
	 * @NOTE Taken from WordPress core. Altered to work for metadata.
	 * @see WP Core get_the_archive_title()
	 *
	 * @since 3.1.0
	 *
	 * @param \WP_Term|\WP_Error|null $term The Term object or error. Leave null to autodetermine query.
	 * @return string The generated archive title, not escaped.
	 */
	public function get_generated_archive_title( $term = null ) {

		if ( $term && \is_wp_error( $term ) )
			return '';

		if ( is_null( $term ) ) {
			$_query = true;
			$term   = \get_queried_object();
		} else {
			$_query = false;
		}

		/**
		 * @since 2.6.0
		 *
		 * @param string   $title The short circuit title.
		 * @param \WP_Term $term The Term object.
		 */
		$title = (string) \apply_filters( 'the_seo_framework_the_archive_title', '', $term );

		if ( $title )
			return $title;

		$use_prefix = $this->use_generated_archive_prefix();
		$_tax = isset( $term->taxonomy ) ? $term->taxonomy : '';

		if ( ! $_query ) {
			if ( $_tax ) {
				if ( 'category' === $_tax ) {
					$title = $this->get_generated_single_term_title( $term );
					/* translators: Category archive title. 1: Category name */
					$title = $use_prefix ? sprintf( \__( 'Category: %s', 'default' ), $title ) : $title;
				} elseif ( 'tag' === $_tax ) {
					$title = $this->get_generated_single_term_title( $term );
					/* translators: Tag archive title. 1: Tag name */
					$title = $use_prefix ? sprintf( \__( 'Tag: %s', 'default' ), $title ) : $title;
				} else {
					$title = $this->get_generated_single_term_title( $term );

					if ( $use_prefix && $_prefix = $this->get_tax_type_label( $_tax ) ) {
						/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
						$title = sprintf( \__( '%1$s: %2$s', 'autodescription' ), $_prefix, $title );
					}
				}
			} else {
				$title = \__( 'Archives', 'default' );
			}
		} else {
			if ( $this->is_category() ) {
				$title = $this->get_generated_single_term_title( $term );
				/* translators: Category archive title. 1: Category name */
				$title = $use_prefix ? sprintf( \__( 'Category: %s', 'default' ), $title ) : $title;
			} elseif ( $this->is_tag() ) {
				$title = $this->get_generated_single_term_title( $term );
				/* translators: Tag archive title. 1: Tag name */
				$title = $use_prefix ? sprintf( \__( 'Tag: %s', 'default' ), $title ) : $title;
			} elseif ( $this->is_author() ) {
				$title = \get_the_author();
				/* translators: Author archive title. 1: Author name */
				$title = $use_prefix ? sprintf( \__( 'Author: %s', 'default' ), $title ) : $title;
			} elseif ( $this->is_date() ) {
				if ( $this->is_year() ) {
					$title = \get_the_date( \_x( 'Y', 'yearly archives date format', 'default' ) );
					/* translators: Yearly archive title. 1: Year */
					$title = $use_prefix ? sprintf( \__( 'Year: %s', 'default' ), $title ) : $title;
				} elseif ( $this->is_month() ) {
					$title = \get_the_date( \_x( 'F Y', 'monthly archives date format', 'default' ) );
					/* translators: Monthly archive title. 1: Month name and year */
					$title = $use_prefix ? sprintf( \__( 'Month: %s', 'default' ), $title ) : $title;
				} elseif ( $this->is_day() ) {
					$title = \get_the_date( \_x( 'F j, Y', 'daily archives date format', 'default' ) );
					/* translators: Daily archive title. 1: Date */
					$title = $use_prefix ? sprintf( \__( 'Day: %s', 'default' ), $title ) : $title;
				}
			} elseif ( \is_tax( 'post_format' ) ) {
				if ( \is_tax( 'post_format', 'post-format-aside' ) ) {
					$title = \_x( 'Asides', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-gallery' ) ) {
					$title = \_x( 'Galleries', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-image' ) ) {
					$title = \_x( 'Images', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-video' ) ) {
					$title = \_x( 'Videos', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-quote' ) ) {
					$title = \_x( 'Quotes', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-link' ) ) {
					$title = \_x( 'Links', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-status' ) ) {
					$title = \_x( 'Statuses', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-audio' ) ) {
					$title = \_x( 'Audio', 'post format archive title', 'default' );
				} elseif ( \is_tax( 'post_format', 'post-format-chat' ) ) {
					$title = \_x( 'Chats', 'post format archive title', 'default' );
				}
			} elseif ( \is_post_type_archive() ) {
				$title = $this->get_generated_post_type_archive_title() ?: $this->get_tax_type_label( $_tax, false );
				/* translators: Post type archive title. 1: Post type name */
				$title = $use_prefix ? sprintf( \__( 'Archives: %s', 'default' ), $title ) : $title;
			} elseif ( $this->is_tax() ) {
				$title = $this->get_generated_single_term_title( $term );

				if ( $use_prefix && $_prefix = $this->get_tax_type_label( $_tax ) ) {
					/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
					$title = sprintf( \__( '%1$s: %2$s', 'autodescription' ), $_prefix, $title );
				}
			} else {
				$title = \__( 'Archives', 'default' );
			}
		}

		/**
		 * Filters the archive title.
		 *
		 * @since 3.0.4
		 *
		 * @param string $title Archive title to be displayed.
		 * @param \WP_Term $term The term object.
		 */
		return \apply_filters( 'the_seo_framework_generated_archive_title', $title, $term );
	}

	/**
	 * Returns Post Title from ID.
	 *
	 * @NOTE Taken from WordPress core. Altered to work in the Admin area.
	 * @see WP Core single_post_title()
	 *
	 * @since 3.1.0
	 *
	 * @param int|\WP_Post $id The Post ID or post object.
	 * @return string The generated post title.
	 */
	public function get_generated_single_post_title( $id = 0 ) {

		//? Home queries can be tricky. Use get_the_real_ID to be certain.
		$_post = \get_post( $id ?: $this->get_the_real_ID(), OBJECT );
		$title = '';

		if ( isset( $_post->post_title ) ) {
			/**
			 * Filters the page title for a single post.
			 *
			 * @since WP Core 0.71
			 *
			 * @param string   $_post_title The single post page title.
			 * @param \WP_Post $_post       The current queried object as returned by get_queried_object().
			 */
			$title = \apply_filters( 'single_post_title', $_post->post_title, $_post );
		}

		return $title;
	}

	/**
	 * Fetches single term title.
	 *
	 * It can autodetermine the term; so, perform your checks prior calling.
	 *
	 * @NOTE Taken from WordPress core. Altered to work in the Admin area.
	 * @see WP Core single_term_title()
	 *
	 * @since 3.1.0
	 *
	 * @param null|\WP_Term $term    The term name, required in the admin area.
	 * @return string The generated single term title.
	 */
	public function get_generated_single_term_title( $term = null ) {

		if ( is_null( $term ) )
			$term = \get_queried_object();

		$term_name = '';

		if ( isset( $term->name ) ) {
			if ( $this->is_category() || 'category' === $term->taxonomy ) {
				/**
				 * Filter the category archive page title.
				 *
				 * @since WP Core 2.0.10
				 *
				 * @param string $term_name Category name for archive being displayed.
				 */
				$term_name = \apply_filters( 'single_cat_title', $term->name );
			} elseif ( $this->is_tag() || 'tag' === $term->taxonomy ) {
				/**
				 * Filter the tag archive page title.
				 *
				 * @since WP Core 2.3.0
				 *
				 * @param string $term_name Tag name for archive being displayed.
				 */
				$term_name = \apply_filters( 'single_tag_title', $term->name );
			} elseif ( $this->is_tax() || $this->is_archive_admin() ) {
				/**
				 * Filter the custom taxonomy archive page title.
				 *
				 * @since WP Core 3.1.0
				 *
				 * @param string $term_name Term name for archive being displayed.
				 */
				$term_name = \apply_filters( 'single_term_title', $term->name );
			} else {
				/**
				 * Don't filter when query is unknown.
				 * The filters don't pass the term; so, they imply the developer knows the term from query.
				 */
				$term_name = $term->name;
			}
		}

		return $term_name;
	}

	/**
	 * Fetches single term title.
	 *
	 * @NOTE Taken from WordPress core. Altered to work in the Admin area.
	 * @see WP Core post_type_archive_title()
	 *
	 * @since 3.1.0
	 *
	 * @param string $post_type The post type.
	 * @return string The generated post type archive title.
	 */
	public function get_generated_post_type_archive_title( $post_type = '' ) {

		$post_type = $post_type ?: \get_query_var( 'post_type' );

		if ( ! \is_post_type_archive( $post_type ) )
			return '';

		if ( is_array( $post_type ) )
			$post_type = reset( $post_type );

		$post_type_obj = \get_post_type_object( $post_type );

		/**
		 * Filters the post type archive title.
		 *
		 * @since WP Core 3.1.0
		 *
		 * @param string $post_type_name Post type 'name' label.
		 * @param string $post_type      Post type.
		 */
		$title = \apply_filters( 'post_type_archive_title', $post_type_obj->labels->name, $post_type );

		return $title;
	}

	/**
	 * Returns untitled title.
	 *
	 * @since 3.1.0
	 *
	 * @return string The untitled title.
	 */
	public function get_static_untitled_title() {
		return \__( 'Untitled', 'default' );
	}

	/**
	 * Returns search title.
	 *
	 * @since 3.1.0
	 *
	 * @return string The generated search title, partially escaped.
	 */
	public function get_generated_search_query_title() {
		/* translators: %s: search phrase */
		return sprintf( \__( 'Search Results for &#8220;%s&#8221;', 'default' ), \get_search_query( true ) );
	}

	/**
	 * Returns 404 title.
	 *
	 * @since 2.6.0
	 * @since 3.1.0 No longer accepts parameters, nor has conditions.
	 *
	 * @return string The generated 404 title.
	 */
	public function get_static_404_title() {
		/**
		 * @since 2.5.2
		 * @param string $title The 404 title.
		 */
		return (string) \apply_filters( 'the_seo_framework_404_title', '404' );
	}

	/**
	 * Merges title branding, when allowed.
	 *
	 * @since 3.1.0
	 * @since 3.1.2 Added strict taxonomical check.
	 * @since 3.1.3 Fixed conditional logic.
	 *
	 * @param string     $title The title. Passed by reference.
	 * @param array|null $args The query arguments. Leave null to autodetermine query.
	 */
	public function merge_title_branding( &$title, $args = null ) {

		if ( null === $args ) {
			$id  = $this->get_the_real_ID();
			$tax = $this->get_current_taxonomy();
		} else {
			$this->fix_generation_args( $args );
			$id  = $args['id'];
			$tax = $args['taxonomy'];
		}

		if ( ! $tax && $this->is_front_page_by_id( $id ) ) {
			$addition    = $this->get_home_page_tagline();
			//? Brilliant. TODO FIXME: Do an "upgrade" of this option at a 3.1.2+ release, switching title with additions in the settings description.
			$seplocation = 'left' === $this->get_home_title_seplocation() ? 'right' : 'left';
		} else {
			$addition    = $this->get_blogname();
			$seplocation = $this->get_title_seplocation();
		}

		$title    = trim( $title );
		$addition = trim( $addition );
		$sep      = $this->get_title_separator();

		if ( $addition && $title ) {
			if ( 'left' === $seplocation ) {
				$title = "$addition $sep $title";
			} else {
				$title = "$title $sep $addition";
			}
		}
	}

	/**
	 * Merges pagination with the title, if paginated.
	 *
	 * @since 3.1.0
	 * @since 3.1.2 Now uses the registered default translation.
	 *
	 * @param string $title The title. Passed by reference.
	 */
	public function merge_title_pagination( &$title ) {

		$page  = $this->page();
		$paged = $this->paged();

		if ( $paged >= 2 || $page >= 2 ) {
			$sep = $this->get_title_separator();

			$paging = sprintf( \__( 'Page %s', 'default' ), max( $paged, $page ) );

			if ( \is_rtl() ) {
				$title = "$paging $sep $title";
			} else {
				$title = "$title $sep $paging";
			}
		}
	}

	/**
	 * Merges title protection prefixes.
	 *
	 * @since 3.1.0
	 * @since 3.1.2 Added strict taxonomical checks for title protection.
 	 * @since 3.1.3 Fixed conditional logic.
	 * @see $this->merge_title_prefixes()
	 *
	 * @param string     $title The title. Passed by reference.
	 * @param array|null $args  The query arguments. Accepts 'id' and 'taxonomy'.
	 *                          Leave null to autodetermine query.
	 * @return void
	 */
	public function merge_title_protection( &$title, $args = null ) {

		if ( null === $args ) {
			$id  = $this->get_the_real_ID();
			$tax = $this->get_current_taxonomy();
		} else {
			$this->fix_generation_args( $args );
			$id  = $args['id'];
			$tax = $args['taxonomy'];
		}

		if ( $tax ) return;

		$post = $id ? \get_post( $id, OBJECT ) : null;

		if ( isset( $post->post_password ) && '' !== $post->post_password ) {
			/**
			 * Filters the text prepended to the post title of private posts.
			 *
			 * The filter is only applied on the front end.
			 *
			 * @since WP Core 2.8.0
			 *
			 * @param string  $prepend Text displayed before the post title.
			 *                         Default 'Private: %s'.
			 * @param WP_Post $post    Current post object.
			 */
			$protected_title_format = (string) \apply_filters( 'protected_title_format', \__( 'Protected: %s', 'default' ), $post );
			$title = sprintf( $protected_title_format, $title );
		} elseif ( isset( $post->post_status ) && 'private' === $post->post_status ) {
			/**
			 * Filters the text prepended to the post title of private posts.
			 *
			 * The filter is only applied on the front end.
			 *
			 * @since WP Core 2.8.0
			 *
			 * @param string  $prepend Text displayed before the post title.
			 *                         Default 'Private: %s'.
			 * @param WP_Post $post    Current post object.
			 */
			$private_title_format = (string) \apply_filters( 'private_title_format', \__( 'Private: %s', 'default' ), $post );
			$title = sprintf( $private_title_format, $title );
		}
	}

	/**
	 * Gets Title Separator.
	 *
	 * @since 2.6.0
	 * @staticvar string $sep
	 *
	 * @return string The Separator, unescaped.
	 */
	public function get_title_separator() {
		static $sep;
		/**
		 * @since 2.3.9
		 * @param string $eparator The title separator
		 */
		return isset( $sep )
			? $sep
			: $sep = (string) \apply_filters( 'the_seo_framework_title_separator', $this->get_separator( 'title' ) );
	}

	/**
	 * Returns title separator location.
	 *
	 * @since 2.6.0
	 * @since 3.1.0 1. Removed the first $seplocation parameter.
	 *              2. The first parameter is now $home
	 *              3. Removed caching.
	 *              4. Removed filters.
	 *
	 * @param bool $home The home separator location.
	 * @return string The separator location.
	 */
	public function get_title_seplocation( $home = false ) {
		return $home ? $this->get_option( 'home_title_location' ) : $this->get_option( 'title_location' );
	}

	/**
	 * Gets Title Seplocation for the homepage.
	 *
	 * @since 2.6.0
	 * @since 3.1.0 Removed first parameter.
	 *
	 * @return string The Seplocation for the homepage.
	 */
	public function get_home_title_seplocation() {
		return $this->get_title_seplocation( true );
	}

	/**
	 * Determines whether to add or remove title branding additions.
	 *
	 * @since 3.1.0
	 * @since 3.1.2: 1. Added filter.
	 *               2. Added strict taxonomical check.
	 * @see $this->merge_title_branding()
	 *
	 * @param array|null $args The query arguments. Accepts 'id' and 'taxonomy'.
	 *                         Leave null to autodetermine query.
	 * @return bool True when additions are allowed.
	 */
	public function use_title_branding( $args = null ) {

		$id = isset( $args['id'] ) ? $args['id'] : $this->get_the_real_ID();
		$taxonomy = null === $args ? $this->get_current_taxonomy()
			: ( isset( $args['taxonomy'] ) ? $args['taxonomy'] : '' );

		$use = true;

		if ( $taxonomy ) {
			$use = ! $this->get_option( 'title_rem_additions' );
		} else {
			if ( $this->is_front_page_by_id( $id ) ) {
				$use = $this->use_home_page_title_tagline();
			} elseif ( ! $this->use_singular_title_branding( $id ) ) {
				$use = false;
			} else {
				$use = ! $this->get_option( 'title_rem_additions' );
			}
		}

		/**
		 * @since 3.1.2
		 * @param bool       $use
		 * @param array|null $args
		 */
		return \apply_filters_ref_array( 'the_seo_framework_use_title_branding', [ $use, $args ] );
	}

	/**
	 * Determines whether to use the autogenerated archive title prefix or not.
	 *
	 * @since 3.1.0
	 *
	 * @return bool
	 */
	public function use_generated_archive_prefix() {
		return ! $this->get_option( 'title_rem_prefixes' );
	}

	/**
	 * Determines whether to add home page tagline.
	 *
	 * @since 2.6.0
	 * @since 3.0.4 Now checks for custom tagline or blogname existence.
	 *
	 * @return bool
	 */
	public function use_home_page_title_tagline() {
		return $this->get_option( 'homepage_tagline' ) && $this->get_home_page_tagline();
	}

	/**
	 * Determines whether to add the tagline.
	 *
	 * @since 3.1.0
	 *
	 * @param int $id The post ID. Optional.
	 * @return bool
	 */
	public function use_singular_title_branding( $id = null ) {
		return ! $this->get_custom_field( '_tsf_title_no_blogname', $id ) && ! $this->get_option( 'title_rem_additions' );
	}

	/**
	 * Returns the home page tagline from option or bloginfo, when set.
	 *
	 * @since 3.0.4
	 * @uses $this->get_blogdescription(), this method already trims.
	 *
	 * @return string The trimmed tagline.
	 */
	public function get_home_page_tagline() {
		return $this->s_title_raw( trim( $this->get_option( 'homepage_title_tagline' ) ) ?: $this->get_blogdescription() ?: '' );
	}
}