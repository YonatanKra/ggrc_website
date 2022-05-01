<?php

/* Template Name: AboutUsTemplate */ 


?>

<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7_dtp.css" rel="stylesheet" type="text/css">

	<?php wp_head(); ?>
</head>

<style type="text/css">
	#site-navigation-wrap .dropdown-menu>li>a{
		padding: 0px 8px !important;		
	}

	#mc_embed_signup form{
		padding: 0px;
	}

	#mce-EMAIL{
		background-color: #fff;
	}

	#mc-embedded-subscribe{
		border-radius: 20px !important;
	}

	#mc_embed_signup div#mce-responses{
		margin: 0px;
		padding: 0px;
	}

	.accordion {
	  color: #0B4F6D;
	  cursor: pointer;
	  width: 100%;
	  border: none;
	  text-align: center;
	  outline: none;
	  font-size: 13px;
	  transition: 0.4s;
	  font-weight: bold;
	}

	.active, .accordion:hover {
	  background-color: #ccc; 
	}

	.panel {
	  display: none;
	  background-color: white;
	  overflow: hidden;
	}

</style>

<body <?php body_class(); ?> <?php oceanwp_schema_markup( 'html' ); ?>>

	<?php wp_body_open(); ?>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<a class="skip-link screen-reader-text" href="#main"><?php oceanwp_theme_strings( 'owp-string-header-skip-link', 'oceanwp' ); ?></a>

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

			<?php do_action( 'ocean_header' ); ?>

			<?php do_action( 'ocean_before_main' ); ?>

			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">

				<?php //do_action( 'ocean_page_header' ); ?>


	<div class="about-banner pt-150 pb-100">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12">
				
				<h1 class="banner-title">About the Global Green Recovery Collaborative</h1>
				
			</div>
		</div>
	</div>
				

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr no-border">

			<?php do_action( 'ocean_before_content' ); ?>
		
			<div id="content" class="site-content clr">				

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<div class="row">

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post(); ?>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<?php the_content(); ?>
						</div>

						<?php

					endwhile;

				}
				?>

					<div class="col-lg-6 col-md-12 col-sm-12">
						<h4>Support the GGRC</h4>
						<p>The launch of the GGRC is made possible by a grant from the Sansom Conservation Leadership Alumni Fund.</p>

						<p>We are seeking additional funding to allow us to grow. If you are interested in partnering with us as a funder, please contact us directly at <a href="mailto:greenrecoverycollaborative@gmail.com">greenrecoverycollaborative@gmail.com</a>. </p>

						<div class="ggrc-faq">
	            			<h3>GGRC FAQs</h3>
	            			<p>Learn more! Check out our FAQs.</p>
	            			<button class="no-border-all"><a href="../faq" class="ggrc-btn-blue-sm">FAQS</a></button>
            			
            			</div>

            			<div class="ggrc-newsletter">
            				<!-- Begin Mailchimp Signup Form -->



	            			<h3>Newsletter</h3>
	            			<p>Do you want updates on our latest featured events, initiatives, and opportunities. Subscribe to our newsletter!</p>

	            			<div id="mc_embed_signup">
								<form action="https://gmail.us14.list-manage.com/subscribe/post?u=34bfbc10b2a30dae3d7d19f2e&amp;id=f07c2e7190" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								    <div id="mc_embed_signup_scroll">
									
								<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
								<div class="mc-field-group">
									<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
								</label>
									<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
								</div>
									<div id="mce-responses" class="clear foot">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_34bfbc10b2a30dae3d7d19f2e_f07c2e7190" tabindex="-1" value=""></div>
								        <div class="optionalParent">
								            <div class="clear foot">
								                <input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe" class="button ggrc-btn-blue-sm">
								                <p class="brandingLogo"><a href="http://eepurl.com/hWA0lD" title="Mailchimp - email marketing made easy and fun"><img src="https://eep.io/mc-cdn-images/template_images/branding_logo_text_dark_dtp.svg"></a></p>
								            </div>
								        </div>
								    </div>
								</form>
							</div>
	            			
            			
            			</div>

					</div>
				</div>

				<?php do_action( 'ocean_after_content_inner' ); ?>

				

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

			<section>
				<div class="volunteer-about mb-60 p-150-lr">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 align-center">
							<p class="mb-30">We are looking for committed volunteers to support and contribute to the GGRC. Volunteer to expand our reach and impact.</p>
							<a href="../contact" class="ggrc-btn-blue-md">Volunteer with us</a>
						</div>
					</div>
				</div>
			</section>

			<section class="container">
				<div class="row mb-60">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h2 class="align-center">Team & Advisors</h2>
						<hr/>
						<h4 class="align-center">Leadership Team</h4>
						<div class="row mb-60">
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Rosalind.png" class="profile-pic">
									<h4 class="align-center mt-80 mb-0">Rosalind Helfand</h4>
									<p class="align-center links"><em>Co-Lead</em></p>
									<p class="align-center"><b>United States</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Rosalind Helfand is an independent expert in environmental and social policy, strategy, and advocacy. Based in Los Angeles, California, she collaborates with communities, nonprofits, and governments to create and implement innovative, intersectional policies and programs. From campaigns to coalitions, she brings people together across issues, including environmental justice, protecting nature, and equity. In the Cambridge University Conservation Leadership masters program, she researched how we can achieve transformative change for the future of biodiversity. Rosalind has contributed to global discussions on “collective crisis leadership” with UCCLAN, and researched local environmental leadership with Jacaranda School in Malawi. She contributes to policy discussions with the Convention on Biological Diversity (CBD) and the Intergovernmental Science-Policy Platform on Biodiversity and Ecosystem Services (IPBES), and successfully led a nonprofit coalition campaign to engage California as the first United States subnational government Observer to the CBD. She founded the environmental policy consultancy, PAJE: Policy. Action. Justice. Environment.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Ravi.png" class="profile-pic">
									<h4 class="align-center mt-80 mb-0">Ravikash Prasad</h4>
									<p class="align-center links"><em>Co-Lead</em></p>
									<p class="align-center"><b>Fiji</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Ravi Prasad has more than ten years of global experience in environment, sustainable development, international relations and climate change. He currently works as the Monitoring and Reporting Specialist with the UNDP Asia-Pacific. He has previously worked as the Field Team Lead with the World Mosquito Program, Australia; International Climate Protection Fellow with the Alexander von Humboldt Foundation, Germany; and International Corps with EarthCorps, USA. He completed an MPhil in Conservation Leadership from University of Cambridge in 2017, and is currently coordinating the Conservation Leadership Alumni Network (CLAN) in Oceania. Ravi loves travelling, learning new languages, rugby (on TV) and watching TV shows. He is really excited to extend his expertise, passion and positivity towards achieving a green recovery for all. </p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/IrisD.png" class="profile-pic">
									<h4 class="align-center mt-80">Iris Dicke</h4>
									<p class="align-center"><b>Netherlands</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Iris Dicke currently works as a Policy Advisor for a political party in the Netherlands, which aims to develop policies based on an ecosystem’s perspective. In her role, Iris focuses on strengthening biodiversity in urban and rural areas as well as how to structurally integrate biodiversity into policy and economy. Prior to this, Iris worked at an international development consultancy and forestry consultancy, focusing on research and analysis of natural resources policy and land rights. As a member of the University of Cambridge, Conservation Leadership Alumni Network (UCCLAN), she helped coordinate and develop a statement for the post-2020 global biodiversity framework for the Convention of Biological Diversity’s – Open-ended Working Group. Now, she would like to further the call for a green recovery. </p>
									</div>
								</div>
							</div>
						
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Lucia.png" class="profile-pic">
									<h4 class="align-center mt-80">Lucia Norris-Crespo</h4>
									<p class="align-center"><b>Ecuador</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Lucia Norris-Crespo was awarded an MPhil in Conservation Leadership at the University of Cambridge (2016-2017) and a double major in International Relations and Communications (2010).  She worked as a political communications Advisor for the City Council on developing communications strategies and sustainability and gender violence campaigns that were implemented in Quito between 2009 and 2013. At FFLA, LAC Secretariat for CDKN, Lucia gained administrative and technical experience while coordinating projects and participating in developing MEL and Communications strategies. In 2014, Lucia started working at WWF as the Public Policies Officer for the Galapagos Programme and later as the M&E Officer for the Ecuador program. In 2018, she worked on a circular economy project to improve the quality of life of waste pickers. From 2019 until July 2021, Lucia was responsible for Jocotoco Foundation in Galapagos, and now she works as an independent consultant on sustainability, conservation, and the circular economy. She is very much interested in understanding and implementing new economic development models.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Roberta.png" class="profile-pic">
									<h4 class="align-center mt-80">Roberta Kamille Pennell</h4>
									<p class="align-center"><b>Belize</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Kamille Pennell currently works for Wildlife Conservation Society (Belize) as the Terrestrial Coordinator, responsible for the implementation of the organisation's terrestrial components of Belize's conservation strategy, ensuring thriving wildlife, wild places and healthy and productive ecosystems. Prior to this, she held the post of CITES Coordinator at WCS and was responsible for building communication, administrative structures and capacity to effectively deliver on Belize’s commitments as a signatory to the Convention on International Trade in Endangered Species (CITES). Earlier in her career, she worked at a local organisation in Southern Belize, which implemented people-focused conservation and evidence informed conservation in and around terrestrial protected areas in development, management and leadership positions. She is skilled in grant writing, conservation policy, fundraising and leadership in conservation. Kamille is interested in the social dimensions of conservations, an interest that was fostered while pursuing the Cambridge Masters in Conservation Leadership.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Carolina.jpg" class="profile-pic">
									<h4 class="align-center mt-80">Carolina Soto-Vargas</h4>
									<p class="align-center"><b>Colombia</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Carolina Soto-Vargas is a very enthusiastic biologist who completed an MPhil in Conservation Leadership from the University of Cambridge in 2017. For the last three years, she has been working for the Humboldt Institute (IAHV), and she leads the Participatory Science and Traditional Knowledge research group. She has worked on several conservation projects, including a spell of five years as a program manager for the Northern South America Jaguar Program; she also worked as the environmental advisor for a project that brokered communication between indigenous communities of the Colombian Amazon and the Colombian government. Carolina speaks four languages and believes in the importance of communication, co-creation, and integration of various systems of knowledge in conservation. She loves working with local communities and tries to propose new approaches to engaging people in conservation through meaningful participation based on ethics, justice, and equity, especially in areas with challenging conditions in terms of violence and inequality.</p>
									</div>
								</div>
							</div>

							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Aditi.jpg" class="profile-pic">
									<h4 class="align-center mt-80">Aditi Jha</h4>
									<p class="align-center"><b>India</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Aditi Jha is a public policy and sustainability specialist. She has developed and managed some of South Asia’s largest landscape conservation projects. At the World Bank, she worked on framing India’s forest and climate engagement strategy and on integrating environmental and social sustainability within multi-million dollar development projects in the agriculture, water supply and transport sectors. She has also held roles at IUCN, where she developed a course on water-governance used by practitioners and diplomats from the Himalayan Region, and at the United Nations, where she managed the World Heritage Biodiversity Programme. Aditi holds an MPhil in Conservation Leadership from the University of Cambridge and a BA in English Literature from St Stephen’s College, Delhi. </p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Janet.png" class="profile-pic">
									<h4 class="align-center mt-80">Janet Taylor</h4>
									<p class="align-center"><b>South Africa</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Janet is a vegetation ecologist from South Africa and currently works for the local government in the province of KwaZulu-Natal. Here she has more than 10 years of research experience and her main focuses are on using research outcomes to provide management recommendations to land users for the sustainable use and conservation of the natural resources within the province.  Her research interests include bush encroachment, plant-animal interactions and savanna ecology. Janet completed an MPhil in Conservation Leadership through the University of Cambridge in 2017, where she gained experience in communication and collaboration during her dissertation on avian species prioritization among conservation partners along a migration route. She also has an MSc in Grassland Science from the University of the Free State (SA). She has been an editor of a magazine for a scientific society in Southern Africa and enjoyed working together as a team. With these skills, she hopes to contribute to the awareness of global green recovery.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Teona.jpg" class="profile-pic">
									<h4 class="align-center mt-80">Teona Gamtsemlidze</h4>
									<p class="align-center"><b>Republic of Georgia / United States</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Teona Gamtsemlidze is from Tbilisi, Georgia, currently residing in Los Angeles, California. She holds a masters degree in law, and has extensive project management and development experience. For over 12 years Teona worked for nonprofit and international organizations, including the Organization for Security and Cooperation in Europe (OSCE) and the United Nations Development Programme (UNDP). Her primary focus was democratic governance, sustainable development, public awareness raising and education, advocacy and policy making as well as human rights promotion. Working for OSCE and UNDP enabled her to be engaged in capacity building of democratic institutions and to shape policy making. She advocated for adoption of a number of positive changes to the election legislation to bring it closer to international standards. Teona is a fully accredited BRIDGE facilitator. BRIDGE stands for Building Resources in Democracy, Governance and Elections and is a capacity development tool, designed to be used for institutional excellence.</p>
									</div>
								</div>
							</div>
						</div>

						<!-- <h4 class="align-center">Communications</h4>

						<div class="row mb-60 p-170-lr">
							<div class="col-lg-6 col-md-12 col-sm-12 mt-150">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Janet.png" class="profile-pic">
									<h4 class="align-center mt-80">Janet Taylor</h4>
									<p class="align-center"><b>South Africa</b></p>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12 mt-150">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Alastair.png" class="profile-pic">
									<h4 class="align-center mt-80">Alastair Jones</h4>
									<p class="align-center"><b>Australia</b></p>
								</div>
							</div>
						</div> -->

						<div class="row mb-60">
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<hr>
								<h4 class="align-center">Advisor</h4>
								<div class="team-blocks mt-150">
									<img src="../wp-content/uploads/team/Noa.png" class="profile-pic">
									<h4 class="align-center mt-80">Noa Steiner</h4>
									<p class="align-center"><b>Israel</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Noa Steiner is a passionate environmental policy expert, and a current PhD candidate studying the EU Common Fisheries Policy. Noa’s educational background includes a BSc in Life Sciences, an MSc in Desert Studies from Ben Gurion University of the Negev, Israel and an MPhil in Conservation Leadership from the University of Cambridge in the UK. Noa has worked in both the public sector at the Israeli Ministry of Environmental Protection, as well as in international NGOs -  BirdLife International and UNEP-WCMC and specialized in policy formulation for nature conservation. She is interested in learning from fields such as behavioural economics and cognitive psychology in order to integrate within environmental policy and decision-making processes, which could contribute to a rapid and effective transition into a more sustainable world. </p>
									</div>
								</div>
							</div> 
							
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<hr>
								<h4 class="align-center">Intern</h4>
								<div class="team-blocks mt-150">
									<img src="../wp-content/uploads/team/Rachael.jpg" class="profile-pic">
									<h4 class="align-center mt-80">Rachael Chandra</h4>
									<p class="align-center"><b>Fiji</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Rachael Chandra was born and raised in Fiji. Growing up in a Pacific Island country, she developed enthusiasm for solving the issues that are degrading our environment and causing global climate change, particularly in the Pacific Islands. Her passion for her environment led her to complete her B.A. in Environmental Management at the University of the South Pacific. One of Rachael’s key achievements was winning the National Essay Competition’s Certificate of Commendation. In her essay, she emphasized being environmentally friendly by using biodegradable plastics and switching to green energy to reduce the occurrence of intense cyclones in the Pacific. Rachael aspires to work in an international environmental organization that promotes sustainability. She is excited to join the GGRC team as an intern, and to gain the practical skills and experience she needs to achieve her goals.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<hr>
								<h4 class="align-center">Intern</h4>
								<div class="team-blocks mt-150">
									<img src="../wp-content/uploads/team/Diana.jpeg" class="profile-pic">
									<h4 class="align-center mt-80">Diana Rudenky</h4>
									<p class="align-center"><b>United States</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Diana Rudenky studies Political Science, with a concentration in International Relations, and Russian Studies at University of California, Los Angeles. She has previously interned with Rosalind Helfand to help organize a coalition of environmental nonprofits to support California’s participation in the Convention on Biological Diversity and worked as an intern with California State Senator Allen’s office. These experiences have inspired her decision to pursue a career in foreign policy. </p>
									</div>
								</div>
							</div>
							
						</div>

						<hr/>
						<h4 class="align-center">Web Team</h4>
						<div class="row mb-60">
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/IrisL.png" class="profile-pic">
									<h4 class="align-center mt-80">Iris Livneh</h4>
									<p class="align-center links"><em>UX Designer</em></p>
									<p class="align-center"><b>Israel</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Iris Livneh is a UX designer and researcher with a BA in Psychology and American Literature and an MSc in Cognitive Psychology and Human Factors Engineering. She has worked at B2B product companies, focusing on complex systems and end-to-end design processes (research, UX/UI), and currently working at Buildots, a start-up dedicated to bringing high-tech abilities to the construction industry. When the COVID pandemic broke, she searched for ways to help by contributing from her professional experience. She volunteered for both a design group that planned technological solutions to help medical staff avoid becoming impaired by the disease and the Global Green Recovery Collaborative to make COVID an opportunity to help bring about a positive change in the environment. She lives in the north of Israel, and in her free time, she enjoys solving riddles (escape room enthusiast!), watching football games, music, and cooking.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Dana.png" class="profile-pic">
									<h4 class="align-center mt-80">Dana Dellus-Neeman</h4>
									<p class="align-center links"><em>UI Designer</em></p>
									<p class="align-center"><b>Israel</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Dana Dellus is a freelance Ui/Ux designer from Israel. She creates identity branding for local and international companies and organizations, from logos to brand guidelines, across multiple platforms. Responsible from inception to launch and updating the design and designing intuitive and engaging user experiences for the client’s products, with beautifully crafted ui elements tailor made for the client. She is working closely alongside clients, helping them understand their needs, and tailoring the user’s experience and visual requirements to meet their needs and goals. She lives in Rehovot with her family and loves chocolate, typography, and (happy) colors.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Shavnita.jpg" class="profile-pic">
									<h4 class="align-center mt-80">Shavnita Dutt</h4>
									<p class="align-center links"><em>Website Developer</em></p>
									<p class="align-center"><b>Fiji</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Shavnita Dutt is a website developer based in Fiji. She has over five years experience in software development focused mainly on web-based applications. She has developed 12 websites and maintains over 55 websites in her current position as Senior Website Designer in the Fijian Government’s ITC. Apart from her interest in the field of IT, she is also interested in climate change and how as an individual she can contribute to our environment in a positive way. She continuously seeks to learn and increase awareness of her surroundings by watching documentaries on environmental related issues. Additionally, she plans to found an environmentally friendly business for local supermarkets to install vending machines for recycling plastic bottles, as plastic pollution is one of the biggest factors affecting our marine life. She holds a Bachelor of Science in Computer Science and Information Systems from the University of the South Pacific, Fiji.</p>
									</div>
								</div>
							</div>
						
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Yonatan.png" class="profile-pic">
									<h4 class="align-center mt-80">Yonatan Kra</h4>
									<p class="align-center links"><em>Website Developer</em></p>
									<p class="align-center"><b>Israel</b></p>
									<p class="accordion mb-0">Read Bio </p>
									<div class="panel">
									  <p>Yonatan Kra has been involved in some awesome projects in the academy and the industry - from C/C++ through Matlab to PHP and javascript. Former neuroscientist, CTO at Webiks and Software Architect at WalkMe. Currently he is a software architect at Vonage and an egghead instructor.</p>
									</div>
								</div>
							</div>
						</div

					</div>
					
				</div>
				
			</section>

	<?php do_action( 'ocean_after_content_wrap' ); ?>

	

<?php get_footer(); ?>

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>