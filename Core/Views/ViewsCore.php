<?php
	/**
	 * Created by Erwan.
	 * Date: 16/10/2017
	 * Time: 15:55
	 */
	
	class ViewsCore
	{
		
		/**
		 * @param      $title
		 * @param bool $style
		 */
		public function head($title, $style = false){
			$this->balise_html();
				$this->balise_head();
					$this->meta(false, false, 'UTF-8');
					$this->meta('viewport', 'width=device-width, initial-scale=1');
			
					if ($style) {
						$this->link($style);
						$this->favicon('favicon');
						$this->link("font-awesome-css");
					}
			
					$this->balise_title($title);
				$this->close_balise_head();
				$this->balise_body();
		}
		
		/**
		 *
		 */
		public function close_page(){
				$this->close_balise_body();
			$this->close_balise_html();
		}
		
		/**
		 * @return string
		 */
		public function balise_html(){
			$html = "<!DOCTYPE html>
						<html lang = 'fr'>";
			
			echo $html;
		}
		
		/**
		 * @echo string
		 */
		public function close_balise_html(){
			$close_html = "</html>";
			
			echo $close_html;
		}
		
		/**
		 * @echo string
		 */
		public function balise_head(){
			$head = "<head>";
			
			echo $head;
		}
		
		/**
		 * @echo string
		 */
		public function close_balise_head(){
			$close_head = "</head>";
			
			echo $close_head;
		}
		
		/**
		 * @echo string
		 */
		public function balise_body(){
			$body = "<body>";
			
			echo $body;
		}
		
		/**
		 * @echo string
		 */
		public function close_balise_body(){
			$close_body = "</body>";
			
			echo $close_body;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function balise_title($content){
			$title = "<title>$content</title>";
			
			echo $title;
		}
		
		/**
		 * @param bool $name
		 * @param bool $content
		 * @param bool $charset
		 *
		 * @echo string
		 */
		public function meta($name = false, $content = false, $charset = false){
			if($name && $content) {
				$meta = "<meta name='$name' content='$content' />";
			}
			elseif($charset){
				$meta = "<meta charset='$charset' />";
			}
			else{
				$meta = '';
			}
			
			echo $meta;
		}
		
		/**
		 * @param $href
		 *
		 * @echo string
		 */
		public function link($href){
			$link = "<link rel='stylesheet' type='text/css' href='$href' />";
			
			echo $link;
		}
		
		/**
		 * @param $href
		 *
		 * @echo string
		 */
		public function favicon($href){
			$link = "<link rel='icon' type='image/png' href='$href' />";
			
			echo $link;
		}
		
		/**
		 * @param $src
		 *
		 * @echo string
		 */
		public function script($src){
			$script = "<script type='text/javascript' src='$src'></script>";
			
			echo $script;
		}
		
		/**
		 * @param $class
		 *
		 * @echo string
		 */
		public function div($class, $id = false){
			
			if($class != '' && isset($id)){
				$div = "<div id='$id' class='$class'>";
			}
			elseif ($class == '' && isset($id)) {
				$div = "<div id='$id'>";
			}
			else{
				$div = "<div class='$class'>";
			}
			echo $div;
		}
		
		/**
		 * @echo string
		 */
		public function close_div(){
			$close_div = "</div>";
			
			echo $close_div;
		}
		
		/**
		 * @param $action
		 *
		 * @echo string
		 */
		public function form($action, $method){
			$form = "<form action='$action' method='$method'>";
			
			echo $form;
		}
		
		/**
		 * @echo string
		 */
		public function close_form(){
			$close_form = "</form>";
			
			echo $close_form;
		}
		
		/**
		 * @param bool $for
		 *
		 * @echo string
		 */
		public function label($for = false){
			if($for){
				$label = "<label for='$for'>";
			}
			else{
				$label = "<label>";
			}
			
			echo $label;
		}
		
		/**
		 * @echo string
		 */
		public function close_label(){
			$close_label = "</label>";
			
			echo $close_label;
		}
		
		/**
		 * @param $rows
		 * @param $cols
		 * @param $name
		 *
		 * @echo string
		 */
		public function textarea($rows, $cols, $name, $placeholder = false){
			
			if($placeholder){
				$textarea = "<textarea rows='$rows' cols='$cols' name='$name' placeholder='$placeholder'>";
			}
			else {
				$textarea = "<textarea rows='$rows' cols='$cols' name='$name'>";
			}
			
			echo $textarea;
		}
		
		/**
		 * @echo string
		 */
		public function close_textarea(){
			$close_textarea = "</textarea>";
			
			echo $close_textarea;
		}
		
		/**
		 * @param      $type
		 * @param      $id
		 * @param      $class
		 * @param      $name
		 * @param bool $values
		 *
		 * @echo string
		 */
		public function input($type, $class, $name, $id = false, $values = false, $placeholder = false){
			
			$label = "<input type='$type' class='$class' name='$name' ";
			
			if($id){
				$label .= "id='$id' ";
			}
			
			if($values){
				$label .= "value='$values' ";
			}
			
			if ($placeholder){
				$label .= "placeholder='$placeholder' ";
			}
			
			$label .= "/>";
			
			
			echo $label;
		}
		
		/**
		 * @param      $href
		 * @param      $class
		 * @param bool $role
		 *
		 * @echo string
		 */
		public function a($href, $class, $content = false, $role = false){
			
			if($role) {
				$a = "<a href='$href' class='$class' role='$role'>$content";
			}
			else{
				$a = "<a href='$href' class='$class'>$content";
			}
			
			echo $a;
		}
		
		/**
		 * @echo string
		 */
		public function close_a(){
			$close_a = "</a>";
			
			echo $close_a;
		}
		
		/**
		 * @param      $src
		 * @param      $class
		 * @param      $alt
		 * @param bool $width
		 * @param bool $height
		 *
		 * @echo string
		 */
		public function img($src, $class, $alt, $width = false, $height = false){
			
			if($width && $height) {
				$img = "<img src='$src' class='$class' alt='$alt' width='$width' height='$height' />";
			}
			else{
				$img = "<img src='$src' class='$class' alt='$alt' />";
			}
			
			echo $img;
		}
		
		/**
		 * @param      $type
		 * @param      $class
		 * @param bool $values
		 *
		 * @echo string
		 */
		public function button($type, $class, $values = false){
			
			if($values) {
				$button = "<button type='$type' class='$class' value='$values'>";
			}
			else{
				$button =  "<button type='$type' class='$class'>";
			}
			
			echo $button;
		}
		
		/**
		 * @echo string
		 */
		public  function close_button(){
			$close_button = "</button>";
			
			echo $close_button;
		}
		
		/**
		 * @echo string
		 */
		public function nav(){
			$nav = "<nav>";
			
			echo $nav;
		}
		
		/**
		 * @echo string
		 */
		public function close_nav(){
			$nav = "</nav>";
			
			echo $nav;
		}
		
		/**
		 * @echo string
		 */
		public function header(){
			$header = "<header>";
			
			echo $header;
		}
		
		/**
		 * @echo string
		 */
		public function close_header(){
			$close_header = "</header>";
			
			echo $close_header;
		}
		
		/**
		 * @echo string
		 */
		public function footer(){
			$footer = "<footer>";
			
			echo $footer;
		}
		
		/**
		 * @echo string
		 */
		public function close_footer(){
			$close_footer = "</footer>";
			
			echo $close_footer;
		}
		
		/**
		 * @echo string
		 */
		public function ul($class = false, $role = false){
			
			if($class){
				$ul = "<ul class='$class'>";
			}
			
			if($role){
				$ul = "<ul role='$role'>";
			}
			
			if ($class && $role) {
				$ul = "<ul role='$role' class='$class'>";
			}
			
			if($class = false && $role = false){
				$ul = "<ul>";
			}
			
			echo $ul;
		}
		
		/**
		 * @echo string
		 */
		public function close_ul(){
			$close_ul = "</ul>";
			
			echo $close_ul;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function li($content, $content_class = false, $a = false, $a_tab = false){
			$li = $a ? "<li class='$content_class'><a href='$a'>$content</a></li>" : "<li class='$content_class'>$content</li>";
			$li = $a_tab ? "<li class='$content_class'><a tabindex='0' href='$a'>$content</a></li>" : $li;
			echo $li;
		}
		
		/**
		 * @echo string
		 */
		public function pre(){
			$pre = "<pre>";
			
			echo $pre;
		}
		
		/**
		 * @echo string
		 */
		public function close_pre(){
			$close_pre = "</pre>";
			
			echo $close_pre;
		}
		
		/**
		 * @echo string
		 */
		public function br(){
			$br = "<br />";
			
			echo $br;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function h1($class, $content){
			$h1 = "<h1 class='$class'>$content</h1>";
			
			echo $h1;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function h2($class, $content){
			$h2 = "<h2 class='$class'>$content</h2>";
			
			echo $h2;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function h3($class, $content){
			$h3 = "<h3 class='$class'>$content</h3>";
			
			echo $h3;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function h4($class, $content){
			$h4 = "<h4 class='$class'>$content</h4>";
			
			echo $h4;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function h5($class, $content){
			$h5 = "<h5 class='$class'>$content</h5>";
			
			echo $h5;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function h6($class, $content){
			$h6 = "<h6 class='$class'>$content</h6>";
			
			echo $h6;
		}
		
		/**
		 * @param $content
		 *
		 * @echo string
		 */
		public function p($content, $class = false, $i = false){
			
			if($i){
				$p = "<p><i class='$class'></i> $content</p>";
			}
			else{
				$p = $class ? "<p class='$class'>$content</p>" : "<p>$content</p>";
			}
			
			echo $p;
		}
		
		public function i($content){
			$i = "<i class='$content'></i>";
			
			echo $i;
		}
		
		public function span($content){
			$span = "<span>$content</span>";
			
			echo $span;
		}
		
		/**
		 * @param $content
		 */
		public function strong($content){
			$strong = "<strong>$content</strong>";
			
			echo $strong;
		}
		
		public function log_erreur_sql($models, $fonction, $erreur){
			
			$test = "<p>Veuillez vérifier la requète SQL dans le fichier : ".
						"<strong>$models</strong>".
					"</p>";
			
			$test .= "<p>Dans la fonction : ".
					    "<strong>$fonction</strong>".
					 "</p>";
			
			$test .= "<p>Problème : ".
						"<strong>$erreur</strong>".
					 "</p>";
			
			return $test;
		}
		
		public function Menu(){
	
			$this->div('menu');
				$this->nav();
					$this->ul('nav', 'navigation');
						$this->li('Documentation', '', 'Documentation');
						$this->li('Communauté', '','#2');
						$this->li('Contribuer','', '#3');
						$this->li('Contact', '', 'Contact');
					$this->close_ul();
				$this->close_nav();
			$this->close_div();
			
			$this->div('menu-collapsed');
				$this->div('bar'); $this->close_div();
				$this->nav();
					$this->ul('nav_mobile');
						$this->li('Documentation', '', 'Documentation');
						$this->li('Communauté', '','#2');
						$this->li('Contribuer','', '#3');
						$this->li('Contact', '', 'Contact');
					$this->close_ul();
			    $this->close_nav();
			$this->close_div();
		}
		
		public function FooterSite(){
			
			$this->footer();
			
				$this->div('copyright');
					$this->p('&copy 2018 - Erwan');
				$this->close_div();
				
			$this->close_footer();
		}
		
	}