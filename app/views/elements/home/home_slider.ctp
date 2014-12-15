							<!--
							#################################
								- THEMEPUNCH BANNER -
							#################################
                
							-->
                <? 
                $infoSlide = $this->requestAction('/homes/getInfoSlideShow');
                $data_x = array('bottom','center', 'left', 'right');
                
                ?>
							<div class="fullwidthbanner">
								<ul >

									<!-- papercut fade turnoff flyin slideright slideleft slideup slidedown-->
									<? foreach ($infoSlide as $slide){  ?>
  									<!-- FADE -->
  									<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 		
                      <?=$this->Html->image( '../fotos/fix_img.php?i='.$slide['FirstPhoto'][0]['name']."&amp;w=1000&amp;h=446&amp;radius=0",  array('alt'=>$slide['FirstPhoto'][0]['details']))?>								
  										<?#$html->image("../fotos/".$slide['FirstPhoto'][0]['name'], array('alt' => $slide['FirstPhoto'][0]['details']))?>
  										<div class="tp-caption scrolleffect sft"
  											 data-x="<?=$data_x[rand(0, 3)]?>"
  											 data-y="100"
  											 data-speed="1000"
  											 data-start="800"
  											 data-easing="easeOutExpo"  >
  											 <div class="sboxpurple">
  												<span class="lato size100 slim caps white"><?=$slide["Oferta"]['name']?></span><br/>
  												<span class="lato size20 normal caps white">desde</span><br/><br/>
  												<span class="lato size48 slim uppercase yellow">$<?=number_format($slide["Oferta"]['precio'], 0)?></span><br/>
  											 </div>
  										</div>	
  										<div class="tp-caption sfb"
  											 data-x="left"
  											 data-y="371"
  											 data-speed="1000"
  											 data-start="800"
  											 data-easing="easeOutExpo"  >
  											<div class="blacklable">
  											<h2 class="lato bold white"><?=$slide["Oferta"]['name']?> desde <span class="green">$<?=number_format($slide["Oferta"]['precio'], 0)?></span></h4>
  											<h3 class="lato grey mt-10"><?=$text->truncate($slide["Oferta"]['introduccion'], 100)?></h5>
  											</div>
  										</div>	
  									</li>
								  <? } ?>
									
									
								</ul>
								<div class="tp-bannertimer none"></div>
							</div>
						
						<!--
						##############################
						 - ACTIVATE THE BANNER HERE -
						##############################
						-->
						<script type="text/javascript">

							var tpj=jQuery;
							tpj.noConflict();

							tpj(document).ready(function() {

							if (tpj.fn.cssOriginal!=undefined)
								tpj.fn.css = tpj.fn.cssOriginal;

								var api = tpj('.fullwidthbanner').revolution(
									{
										delay:9000,
										startwidth:960,
										startheight:446,

										onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

										thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
										thumbHeight:50,
										thumbAmount:3,

										hideThumbs:0,
										navigationType:"bullet",				// bullet, thumb, none
										navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

										navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


										navigationHAlign:"right",				// Vertical Align top,center,bottom
										navigationVAlign:"bottom",					// Horizontal Align left,center,right
										navigationHOffset:30,
										navigationVOffset:30,

										soloArrowLeftHalign:"left",
										soloArrowLeftValign:"center",
										soloArrowLeftHOffset:20,
										soloArrowLeftVOffset:0,

										soloArrowRightHalign:"right",
										soloArrowRightValign:"center",
										soloArrowRightHOffset:20,
										soloArrowRightVOffset:0,

										touchenabled:"on",						// Enable Swipe Function : on/off


										stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
										stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

										hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
										hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
										hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


										fullWidth:"on",

										shadow:1								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

									});

									
									
									
									

									// TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
									// YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
										api.bind("revolution.slide.onloaded",function (e) {


											jQuery('.tparrows').each(function() {
												var arrows=jQuery(this);

												var timer = setInterval(function() {

													if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
													  arrows.fadeOut(300);
												},3000);
											})

											jQuery('.tp-simpleresponsive, .tparrows').hover(function() {
												jQuery('.tp-simpleresponsive').addClass("mouseisover");
												jQuery('body').find('.tparrows').each(function() {
													jQuery(this).fadeIn(300);
												});
											}, function() {
												if (!jQuery(this).hasClass("tparrows"))
													jQuery('.tp-simpleresponsive').removeClass("mouseisover");
											})
										});
									// END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS

						});
						
						
						
						
						jQuery(document).ready(function($){
							// gets the width of black bar at the bottom of the slider
							var $gwsr = $('.scolright').outerWidth();
							$('.blacklable').css({'width' : $gwsr +'px'});
						});
						jQuery(window).resize(function() {
							jQuery(document).ready(function($){

								// gets the width of black bar at the bottom of the slider
								var $gwsr = $('.scolright').outerWidth();
								$('.blacklable').css({'width' : $gwsr +'px'});

							});
						});
						
						




						</script>
