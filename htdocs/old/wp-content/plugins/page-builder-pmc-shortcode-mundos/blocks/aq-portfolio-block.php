<?php


if(!class_exists('AQ_Portfolio_Block')) {
	class AQ_Portfolio_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Sorting Portfolio',
				'size' => 'span12'
			);
			
			//create the block
			parent::__construct('aq_portfolio_block', $block_options);
		}
		
		function form($instance) {
	
			$defaults = array(
				'filter' => 1,
				'categories_port'	=> '0',
				'numberofpost'	=> 12,
				'id' => 'porfolio_block',
				'port_ajax' => 'false',	
				'categories_port_selected' => ''	
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			

		$port_categories = ($temp = get_terms('portfoliocategory')) ? $temp : array();
		$categories_options = array();
		foreach($port_categories as $cat) {
			$categories_options[$cat->term_id] = $cat->name;
		}		
		
		$port_categories = ($temp = get_terms('portfoliocategory')) ? $temp : array();
		$categories_options_selected = array();
		$categories_options_selected[-1] = 'None';
		foreach($port_categories as $cat) {
			$categories_options_selected[$cat->term_id] = $cat->name;
		}			
		
		$ajax_options = array(
			'true' => 'True',
			'false' => 'False',
		);
		
		if( function_exists( 'pmc_portfolio' ) ){	
			

			?>
			<p>Note: You should only use this block on a full-width template</p>

			<p class="description half">
				<label for="<?php echo $this->get_field_id('categories_port') ?>">
				Portfolio Categories<br/>
				<?php echo aq_field_multiselect('categories_port', $block_id, $categories_options, $categories_port); ?>
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('categories_port_selected') ?>">
				Select active category on load<br/>
				<?php echo aq_field_select('categories_port_selected', $block_id, $categories_options_selected, $categories_port_selected); ?>
				</label>
			</p>			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('filter') ?>">
					<?php echo aq_field_checkbox('filter', $block_id, $filter); ?>
					Show filter?
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('numberofpost') ?>">
					Number of portfolio to show<br/>
				<?php echo aq_field_input('numberofpost', $block_id, $numberofpost) ?>
				</label>
			</p>			
			<p class="description half ">
				<label for="<?php echo $this->get_field_id('id') ?>">
					Id for menu
					<?php echo aq_field_input('id', $block_id, $id, $size = 'full') ?>
				</label>
			</p>			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('port_ajax') ?>">
					Use ajax<br/>
					<?php echo aq_field_select('port_ajax', $block_id, $ajax_options, $port_ajax); ?>
				</label>
			</p>				
			<?php
		}
		else {
			echo '<p class="description note">For this block you need to use PremiumCoding themes!</p>';
		}			
		}
		
		function block($instance) {
	
			extract($instance);
			wp_enqueue_script('pmc_ba-bbq');	
			if(!isset($port_categories)){
				$port_categories = ($temp = get_terms('portfoliocategory','fields=ids')) ? $temp : array();
				
			}

			if($filter && count($port_categories) > 1){ ?>				
				<div id="<?php if(isset($id)){ echo $id; }?>">
					<div id="remove" class="portfolioremove" data-option-key="filter">
						<h2>
						<a class="catlink" href="#filter" data-option-value=".ultimos">Ver Últimos <span> </span></a>
						<a class="catlink" href="#filter" data-option-value="*">Ver Todos <span> </span></a>
						<?php
						$i = 1;
						foreach ($port_categories as $category) {

							$find =     array("&", "/", " ","amp;","&#38;");
							$replace  = array("", "", "", "","");
							$entrycategory = str_replace($find , $replace, pmc_getcatname($category,'portfoliocategory'));
							if($category!=54 && $category!=58 && $category!=59){
								if($i == 4) echo '<br>';
								echo '<a class="catlink" href="#filter" data-option-value=".'.$entrycategory .'" >'.pmc_getcatname($category,'portfoliocategory').' <span class="aftersortingword"> </span></a>';						
								$i++;
							}
						}
						?>
						</h2>
					</div>
				</div>
			<?php } ?>
							
			<?php pmc_portfolio(4,4,'port',$numberofpost,$port_categories,$port_ajax); ?>
						
			<?php wp_reset_query(); ?>			

			
  <script>
    jQuery(function(){
      
      var $container = jQuery('#portitems4');

      $container.isotope({
        itemSelector : '.item4'
		<?php if (isset($categories_port_selected) and $categories_port_selected != -1 ){
			  $cat = pmc_getcatname($categories_port_selected,'portfoliocategory'); ?>
		,filter : '.<?php echo $cat ?>'
		<?php }else{ ?>
		,filter : '.ultimos'
		<?php } ?>
      });
      
	  var $relTag = jQuery('.home-portfolio-categories a');
	  
	  $relTag.removeAttr('href');
      
      var $optionSets = jQuery('#remove'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('#remove');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

      
    });
  </script>

<?php
			
		}
		
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
		
	}
}