<?php
/*
Plugin Name: OfficeHour Widget
Plugin URI: http://www.officehour.fr
Description: Widget OfficeHour pour intégrer le profil d'un expert OfficeHour sur votre blog WordPress
Version: 0.1
Author: OfficeHour
Author URI: http://www.officehour.fr
License: GPL2
*/

class OfficeHour_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('officehour_widget', 'OfficeHour', array('description' => 'Widget OfficeHour','classname' => 'officehour-widget'));
    }
    
    public function widget($args, $d)
    {
        extract($args);

        echo $before_widget;

	if(isset($d['title']) && !empty($d['title'])) {
        	echo $before_title.$d['title'].$after_title;
	}

        if(isset($d['slug']) && !empty($d['slug'])) {
        ?>
        <a 
            id='officehour_widget'
            data-slug='<?php echo $d['slug']; ?>'
            href='http://www.officehour.fr/<?php echo $d['slug']; ?>'
            <?php 
            
            if(isset($d['width']) && !empty($d['width'])) { ?>
                data-width='<?php echo $d['width']?>'
            <?php 
            
            } ?><?php 
            if(isset($d['height']) && !empty($d['height'])) { ?>
            data-height='<?php echo $d['height']?>'
            <?php 
            
            } ?><?php 
            if(isset($d['price']) && !empty($d['price'])) { ?>
            data-price='true'
            <?php 
            
            } ?><?php if(isset($d['border-color']) && !empty($d['border-color'])) { ?>
            data-border-color='<?php echo $d['border-color'];?>'
            <?php 
            
            } ?><?php if(isset($d['button-color']) && !empty($d['button-color'])) { ?>
            data-button-color='<?php echo $d['button-color'];?>'
            <?php 
            
            } ?><?php if(isset($d['background-color']) && !empty($d['background-color'])) { ?>
            data-background-color='<?php echo $d['background-color'];?>'
            <?php 
            
            } ?><?php if(isset($d['button-text-color']) && !empty($d['button-text-color'])) { ?>
            data-button-text-color='<?php echo $d['button-text-color'];?>'
            <?php 
            
            } ?><?php if(isset($d['body-text-color']) && !empty($d['body-text-color'])) { ?>
            data-body-text-color='<?php echo $d['body-text-color'];?>'
            <?php 
            
            }?><?php if(isset($d['button-text']) && !empty($d['button-text'])) { ?>
            data-button-text='<?php echo addslashes($d['button-text']);?>'
            <?php 
            
            } ?>
        >
            <?php if( empty($d['name']) ) { ?>
                OfficeHour
            <?php } else { ?>
                <?php echo $d['name']; ?> sur OfficeHour
            <?php } ?>
        </a>

        <script src='http://www.officehour.fr/widget/script.js/expert' type='text/javascript'></script>
        <?php
        }
        
        echo $after_widget;
    }

    public function form($d)
    {
	// default values
        $default = array(
			'title' => 'OfficeHour',
                        'slug' => '',
                        'name' => ''
		);

	$d = wp_parse_args($d, $default);

        ?>
	<h3>Configuration</h3>
        <p>
		<label for='<?php echo $this->get_field_id('title'); ?>'>Titre du Widget (facultatif)</label>
		<br/>
		<input value='<?php echo $d['title']; ?>'  name='<?php echo $this->get_field_name('title'); ?>' id='<?php echo $this->get_field_id('title'); ?>' type='text'/>
	</p>
        <p>
		<label for='<?php echo $this->get_field_id('name'); ?>'>Nom (facultatif)</label>
                <br/>
		<input value='<?php echo $d['name']; ?>' placeholder='ex. Xavier Niel' name='<?php echo $this->get_field_name('name'); ?>' id='<?php echo $this->get_field_id('name'); ?>' type='text'/>
	</p>
        <p>
            	<label for='<?php echo $this->get_field_id('slug'); ?>' style='color:#ff5f5f;font-weight:bold;'>Nom d'utilisateur OfficeHour</label>
            	<br/>
		<input value='<?php echo $d['slug']; ?>' placeholder='ex. xavier-niel' name='<?php echo $this->get_field_name('slug'); ?>' id='<?php echo $this->get_field_id('slug'); ?>' type='text'/>
		<br/>
		<br/>
		Exemple : http://www.officehour.fr/<b style='color:#ff5f5f;'>xavier-niel</b>
		<br/>
		<br/>
		<small>
			Retrouvez votre nom d'utilisateur en vous connectant sur votre Compte : <a target='_blank'  href='http://www.officehour.fr/expert/profile/description'>Mon Compte</a>
		</small>
		<br/>
		<br/>
	</p>
	<hr>
	<h3>Apparence</h3>
	<p>
                <label for='<?php echo $this->get_field_id('width'); ?>'>Largeur (px ou %)</label>
                <br/>
                <input value='<?php echo $this->issetNotEmpty_Tool($d,'width'); ?>'  name='<?php echo $this->get_field_name('width'); ?>' id='<?php echo $this->get_field_id('width'); ?>' type='text'/>
        </p>
        <p>
                <label for='<?php echo $this->get_field_id('height'); ?>'>Hauteur (px ou %)</label>
                <br/>
                <input value='<?php echo $this->issetNotEmpty_Tool($d,'height'); ?>'  name='<?php echo $this->get_field_name('height'); ?>' id='<?php echo $this->get_field_id('height'); ?>' type='text'/>
        </p>
        <p>
                <label for='<?php echo $this->get_field_id('body-text-color'); ?>'>Couleur du texte (hex, ex. #F07057)</label>
                <br/>
                #<input value='<?php echo $this->issetNotEmpty_Tool($d,'body-text-color'); ?>'  name='<?php echo $this->get_field_name('body-text-color'); ?>' id='<?php echo $this->get_field_id('body-text-color'); ?>' type='text'/>
        </p>
        <p>
                <label for='<?php echo $this->get_field_id('border-color'); ?>'>Couleur de la bordure (hex)</label>
                <br/>
                #<input value='<?php echo $this->issetNotEmpty_Tool($d,'border-color'); ?>'  name='<?php echo $this->get_field_name('border-color'); ?>' id='<?php echo $this->get_field_id('border-color'); ?>' type='text'/>
        </p>
        <p>
                <label for='<?php echo $this->get_field_id('button-color'); ?>'>Couleur du bouton (hex)</label>
                <br/>
                #<input value='<?php echo $this->issetNotEmpty_Tool($d,'button-color'); ?>'  name='<?php echo $this->get_field_name('button-color'); ?>' id='<?php echo $this->get_field_id('button-color'); ?>' type='text'/>
        </p>
        
        <p>
                <label for='<?php echo $this->get_field_id('button-text-color'); ?>'>Couleur du texte du boutton (hex)</label>
                <br/>
                #<input value='<?php echo $this->issetNotEmpty_Tool($d,'button-text-color'); ?>'  name='<?php echo $this->get_field_name('button-text-color'); ?>' id='<?php echo $this->get_field_id('button-text-color'); ?>' type='text'/>
        </p>
        <p>
                <label for='<?php echo $this->get_field_id('background-color'); ?>'>Couleur de fond (hex)</label>
                <br/>
                #<input value='<?php echo $this->issetNotEmpty_Tool($d,'background-color'); ?>'  name='<?php echo $this->get_field_name('background-color'); ?>' id='<?php echo $this->get_field_id('background-color'); ?>' type='text'/>
        </p>
        <p>
                <label for='<?php echo $this->get_field_id('button-text'); ?>'>Texte du boutton (hex)</label>
                <br/>
                <input value='<?php echo $this->issetNotEmpty_Tool($d,'button-text'); ?>'  name='<?php echo $this->get_field_name('button-text'); ?>' id='<?php echo $this->get_field_id('button-text'); ?>' type='text'/>
        </p>
        
        <p>
                <label for='<?php echo $this->get_field_id('price'); ?>'>Afficher le tarif</label>
                <br/>
                <input value='true' <?php if($this->issetNotEmpty_Tool($d,'price')) {?> checked='checked'<?php } ?> name='<?php echo $this->get_field_name('price'); ?>' id='<?php echo $this->get_field_id('price'); ?>' type='checkbox'/> Oui
        </p>
        
 
        <?php
    }
    
    public function update($new, $old)
    {
         return $new;
    }
    
    public function issetNotEmpty_Tool($tab,$key) {
        if(isset($tab[$key]) && !empty($tab[$key])) {
            return $tab[$key];
        } else {
            return '';
        }
    }
}


add_action('widgets_init', function(){register_widget('OfficeHour_Widget');});
