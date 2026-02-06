<footer class="footer">
	<div class="__wrap bg-dark relative">
		<div class="__wrapper c-main relative z-10">
			<div class="__widgets grid gap-1 md:gap-6 py-36">
				@for ($i = 1; $i <= 4; $i++)
					@if (is_active_sidebar('sidebar-footer-' . $i))
					<div>@php(dynamic_sidebar('sidebar-footer-' . $i))</div>
			@endif
			@endfor
		</div>
	</div>
	<img class="absolute left-0 bottom-0" src="/wp-content/uploads/2025/09/footer-img.svg" />
	</div>

	<div class="c-main flex flex-col md:flex-row justify-between gap-6 py-10 footer-bottom">
		<p class="">Copyright ©2025 <?php echo get_bloginfo('name'); ?>. All Rights Reserved</p>
		<p class="flex gap-2">Designed &amp; Developed by
			<a target="_blank" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="/wp-content/themes/windes/resources/images/ohsofresh.svg"></a>
		</p>
	</div>
	</div>

   <svg style="display: none; position: absolute; width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <filter id="glass-blur">
                <feTurbulence type="fractalNoise" baseFrequency="0.05 0.05" numOctaves="1" result="turbulence" />
                <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="50" xChannelSelector="R" yChannelSelector="G" />
            </filter>
        </defs>
    </svg>

</footer>