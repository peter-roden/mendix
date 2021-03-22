<?php
/**
 * Template Name: Academy
 */

get_header(); ?>


<?php function the_background_shield() { ?>
	<div class="cardAcademyCourse__shield">
		<svg height="69" viewBox="0 0 112 128" width="65" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="98.710539%">
				<stop offset="0" stop-color="#fff" stop-opacity=".296365"/>
				<stop offset="1" stop-color="#fff" stop-opacity="0"/>
			</linearGradient>
			<g fill="none" fill-rule="evenodd" transform="translate(-40 -33)">
				<path class='cardAcademyCourse__shield__outline' d="m52 38h88c3.865993 0 7 3.1340068 7 7v79.060783c0 2.620042-1.463142 5.020739-3.791812 6.221537l-47.208188 24.343299-47.2081881-24.343299c-2.3286703-1.200798-3.7918119-3.601495-3.7918119-6.221537v-79.060783c0-3.8659932 3.1340068-7 7-7z" fill="#fff" fill-rule="evenodd" stroke="#fff" stroke-width="10"/>
				<path d="m52 38h88c3.865993 0 7 3.1340068 7 7v79.060783c0 2.620042-1.463142 5.020739-3.791812 6.221537l-47.208188 24.343299-47.2081881-24.343299c-2.3286703-1.200798-3.7918119-3.601495-3.7918119-6.221537v-79.060783c0-3.8659932 3.1340068-7 7-7z" stroke="url(#a)" stroke-width="10"/>
				<path class='cardAcademyCourse__shield__border' d="m52 42.5h88c1.380712 0 2.5 1.1192881 2.5 2.5v79.060783c0 .935729-.522551 1.793121-1.354219 2.221977l-45.145781 23.279802-45.1457815-23.279802c-.8316679-.428856-1.3542185-1.286248-1.3542185-2.221977v-79.060783c0-1.3807119 1.1192881-2.5 2.5-2.5z" stroke="#979797" stroke-opacity="1"/>
			</g>
		</svg>

		<div class="cardAcademyCourse__shield__icon">
			<figure>
				<img data-src="https://mendix.com/wp-content/uploads/icon-academy-blank-mendix-logo-mx.svg" class=" icon-academy-blank-mendix-logo-mx lazy" alt="" loading="lazy"/>
			</figure>
		</div>
	</div>
<?php } ?>


<section id='academyIntro' class='section-padding pb1'>
	<div class="grid-container">
		<div class="grid-x text-center align-center">
			<div class="cell large-10 main-heading">
				<h2 class="heading4 medium-heading2">
					Go Make It!
				</h2>
			</div>
		</div>
	</div>
	<hr class='mt2 medium-mt3'>
	<div class="grid-container">
		<ul class="grid-x large-align-center grid-padding-x cards collapse align-top">
			<li class="cell card-block medium-6 mb1 medium-mb3 large-3">
				<div class="h100">
					<div class="grid-x">
						<div class='cell text-center mb1'>
							<figure style='height:68px'>
								<div inline='1' class='content-box inline-block icon-mountain-flag'>
									<?php the_acf_image(53472) ?>
								</div>
							</figure>
						</div>
						<div class="cell text-center">
							<h3 class='heading5 card-heading'>Career</h3>
							<div class='copy card-copy'>
								<p>Set your own goals and make cool stuff with Mendix.</p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="cell card-block medium-6 mb1 medium-mb3 large-3">
				<div class="h100">
					<div class="grid-x">
						<div class='cell text-center mb1'>
							<figure style='height:68px'>
								<div inline='1' class='content-box inline-block icon-app-finger'>
									<?php the_acf_image(53468) ?>
								</div>
							</figure>
						</div>
						<div class="cell text-center">
							<h3 class='heading5 card-heading'>Skills</h3>
							<div class='copy card-copy'>
								<p>Learn the skills to build anything you can imagine.</p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="cell card-block medium-6 mb1 medium-mb3 large-3">
				<div class="h100">
					<div class="grid-x">
						<div class='cell text-center mb1'>
							<figure style='height:68px'>
								<div inline='1' class='content-box inline-block icon-certificate-handshake'>
									<?php the_acf_image(53470) ?>
								</div>
							</figure>
						</div>
						<div class="cell text-center">
							<h3 class='heading5 card-heading'>Credentials</h3>
							<div class='copy card-copy'>
								<p>Prove your abilities and earn recognized credentials.</p>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>


<section id='makeYourCareer' class='section-padding pb1'>
	<div class="grid-container">
		<div class="grid-x text-center align-center">
			<div class="cell large-10 main-heading">
				<h2 class="heading4 medium-heading2">
					Make your career with Mendix
				</h2>
			</div>
		</div>
	</div>
	<hr class='mt2 medium-mt3'>
	<div class="grid-container">
		<ul class="grid-x large-align-center grid-padding-x cards collapse align-top">
			<li class="cell card-block medium-6 mb1 medium-mb3 large-4">
				<div class="h100">
					<div class="grid-x">
						<div class='cell mb1'>
							<figure style='height:60px'>
								<div inline='1' class='content-box inline-block icon-bearded-man'>
									<?php the_acf_image(53469) ?>
								</div>
							</figure>
						</div>
						<div class="cell">
							<h3 class='heading5 card-heading'>Mendix Developer</h3>
							<div class='copy card-copy'>
								<p>As a professional Mendix Developer you love working with the business to identify and find elegant solutions to complex problems. You love solving puzzles, you’re fascinated by technology and you may (or may not) already have an IT background.</p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="cell card-block medium-6 mb1 medium-mb3 large-4">
				<div class="h100">
					<div class="grid-x">
						<div class='cell mb1'>
							<figure style='height:60px'>
								<div inline='1' class='content-box inline-block icon-woman'>
									<?php the_acf_image(53473) ?>
								</div>
							</figure>
						</div>
						<div class="cell">
							<h3 class='heading5 card-heading'>Business Analyst</h3>
							<div class='copy card-copy'>
								<p>As a Mendix Business Analyst, you come from the business and use Mendix to create elegant, customer-focused solutions for complex processes. You’re enthusiastic, hands-on and a crucial part of the Mendix development team, bringing Business and IT together.</p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="cell card-block medium-6 mb1 medium-mb3 large-4">
				<div class="h100">
					<div class="grid-x">
						<div class='cell mb1'>
							<figure style='height:60px'>
								<div inline='1' class='content-box inline-block icon-collared-shirt'>
									<?php the_acf_image(53471) ?>
								</div>
							</figure>
						</div>
						<div class="cell">
							<h3 class='heading5 card-heading'>Solutions Architect</h3>
							<div class='copy card-copy'>
								<p>As a Mendix Solutions Architect, you are the specialist who takes the lead in designing and configuring Mendix solutions for security, scalability, quality and more. You have strong conceptual and problem-solving skills and love to engage with business and IT to create business value and drive innovation.</p>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>


<section class='section-padding pb1'>
	<div class="grid-container">
		<div class="grid-x text-center align-center">
			<div class="cell large-10 main-heading">
				<h2 class="heading4 medium-heading2">
					Skills On Demand
				</h2>
			</div>
			<div class="cell mt2 large-6 sub-heading">
				<p class="heading5">
					Check out our self-paced online courses — the perfect start for any Mendix user!
				</p>
			</div>
		</div>
	</div>
	<hr class='mt3'>
	<div class="grid-container">
		<ul class="grid-x grid-padding-x align-center">
			<li class="cell medium-6 large-4 text-center mb3">
				<div class="cardAcademyCourse beginner">
					<?php the_background_shield() ?>
					<h3 class="heading5">Build an App from Excel</h3>
					<p class='cardAcademyCourse__courseLevel'>Beginner</p>
					<p class='cardAcademyCourse__description'>
						<p>Want a quick demo? Build a first app from an Excel spreadsheet using Mendix Studio.</p>
					</p>
					<a href="https://academy.mendix.com/link/path/75/Build-an-App-from-an-Excel-Spreadsheet" target='_blank' class='cardAcademyCourse__link'>View path</a>
					<p class="cardAcademyCourse__info text-center">
						4 modules |
						0.5 hours
					</p>
				</div>
			</li>
			<li class="cell medium-6 large-4 text-center mb3">
				<div class="cardAcademyCourse rapid">
					<?php the_background_shield() ?>
					<h3 class="heading5">Become a Rapid Developer</h3>
					<p class='cardAcademyCourse__courseLevel'>Rapid</p>
					<p class='cardAcademyCourse__description'>
						<p>Ready for a deep dive? Learn all you need to start building apps using Mendix Studio and Studio Pro.</p>
					</p>
					<a href="https://academy.mendix.com/link/path/31/Become-a-Rapid-Developer-(Analyst)" target='_blank' class='cardAcademyCourse__link'>View path</a>
					<p class="cardAcademyCourse__info text-center">
						11 modules |
						12 hours
					</p>
				</div>
			</li>
			<li class="cell medium-6 large-4 text-center mb3">
				<div class="cardAcademyCourse rapid">
					<?php the_background_shield() ?>
					<h3 class="heading5">Crash Course</h3>
					<p class='cardAcademyCourse__courseLevel'>Rapid</p>
					<p class='cardAcademyCourse__description'>
						<p>Already an experienced Java, C#, .Net, etc. developer? Quickly get under the hood of Mendix.</p>
					</p>
					<a href="https://academy.mendix.com/link/path/82/Crash-Course" target='_blank' class='cardAcademyCourse__link'>View path</a>
					<p class="cardAcademyCourse__info text-center">
						13 modules |
						6 hours
					</p>
				</div>
			</li>
		</ul>
	</div>
</section>



<style>
	.bg-image-1 {
		background-image: url(https://mendix.com/wp-content/uploads/bg-academy-green-topography@3x-scaled.png);
	}
</style>
<section class='section-padding pb1 bg-image-1 overlay--none cover before-opacity-5 bg-image white'>
	<div class="grid-container">
		<div class="grid-x text-center align-center">
			<div class="cell large-10 main-heading">
				<h2 class="heading4 medium-heading2">
					Classroom Training
				</h2>
			</div>
			<div class="cell mt2 large-6 sub-heading">
				<p class="heading5">
					Attend a classroom course at one of our global Mendix offices.
				</p>
			</div>
		</div>
	</div>
	<hr class='mt3'>
	<div class="grid-container">
		<ul class="grid-x grid-padding-x align-center">
			<li class="cell medium-6 large-5 mb3">
				<a href="https://academy.mendix.com/link/classroom" class="cardAcademyOnline rapid">
					<div class="grid-x">
						<figure class="cell medium-4 text-center rapid">
							<div class='center' style='max-width: 96px;'>
								<figure>
									<img width='320' height='320' data-src='https://mendix.com/wp-content/uploads/course-rapid-developer.png' alt='' class=' course-rapid-developer lazy'>
								</figure>
							</div>
							<figcaption>3 days</figcaption>
						</figure>
						<div class="cell pl1 auto">
							<h3 class="heading6 body mb50">Rapid Developer Course</h3>
							<div>
								<p>Learn the fundamentals of the Mendix platform along with how, when, and where to use them.</p>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="cell medium-6 large-5 mb3">
				<a href="https://academy.mendix.com/link/classroom" class="cardAcademyOnline advanced">
					<div class="grid-x">
						<figure class="cell medium-4 text-center advanced">
							<div class='center' style='max-width: 96px;'>
								<figure>
									<img width='320' height='320' data-src='https://mendix.com/wp-content/uploads/mendix-crash-course.png' alt='Crash Course' class=' mendix-crash-course lazy'>
								</figure>
							</div>
							<figcaption>2 days</figcaption>
						</figure>
						<div class="cell pl1 auto">
							<h3 class="heading6 body mb50">Crash Course</h3>
							<div>
								<p>Quickly get under the hood of Mendix for anyone familiar with Java, .Net, C# or similar technologies.</p>
							</div>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>
</section>


<section id='credentials' class='section-padding pb1'>
	<div class="grid-container">
		<div class="grid-x text-center align-center">
			<div class="cell large-10 main-heading">
				<h2 class="heading4 medium-heading2">
					Credentials
				</h2>
			</div>
		</div>
	</div>
	<hr class='mt2 medium-mt3'>
	<div class="grid-container">
		<ul class="grid-x large-align-center grid-padding-x cards collapse align-top">
			<li class="cell card-block medium-6 mb1 medium-mb3 large-4 rapid">
				<div class="h100">
					<div class="grid-x">
						<div class='cell text-center mb1'>
							<figure style='height:102px'>
								<div width='92' height='92' inline='1' class='content-box inline-block mendix-certified-badge'>
									<?php the_acf_image(53902) ?>
								</div>
							</figure>
						</div>
						<div class="cell text-center">
							<h3 class='heading5 card-heading'>Rapid Developer</h3>
							<div class='copy card-copy'>
								<p>This certification shows you understand the fundamentals of the Mendix Platform and how, when, and where to use them.</p>
							</div>
							<div class="mt1">
								<a href='https://academy.mendix.com/link/certification/rapid' class='btn-primary' target='_blank' rel='noopener'>View details</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="cell card-block medium-6 mb1 medium-mb3 large-4 advanced">
				<div class="h100">
					<div class="grid-x">
						<div class='cell text-center mb1'>
							<figure style='height:102px'>
								<div width='92' height='92' inline='1' class='content-box inline-block mendix-certified-badge'>
									<?php the_acf_image(53902) ?>
								</div>
							</figure>
						</div>
						<div class="cell text-center">
							<h3 class='heading5 card-heading'>Advanced Developer</h3>
							<div class='copy card-copy'>
								<p>This certification exam is a practical assignment that will test your Mendix Platform skills and knowledge.</p>
							</div>
							<div class="mt1">
								<a href='https://academy.mendix.com/link/certification/advanced' class='btn-primary' target='_blank' rel='noopener'>View details</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="cell card-block medium-6 mb1 medium-mb3 large-4 expert">
				<div class="h100">
					<div class="grid-x">
						<div class='cell text-center mb1'>
							<figure style='height:102px'>
								<div width='92' height='92' inline='1' class='content-box inline-block mendix-certified-badge'>
									<?php the_acf_image(53902) ?>
								</div>
							</figure>
						</div>
						<div class="cell text-center">
							<h3 class='heading5 card-heading'>Expert Developer</h3>
							<div class='copy card-copy'>
								<p>Certified Expert Developers have proven capabilities in taking the lead when delivering Mendix applications to their customers.</p>
							</div>
							<div class="mt1">
								<a href='https://academy.mendix.com/link/certification/expert' class='btn-primary' target='_blank' rel='noopener'>View Details</a>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>


<?php get_footer(); ?>
