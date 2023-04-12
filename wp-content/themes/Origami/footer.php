<?php
$footer_text = get_option( 'origami_footer_text' );
$footer_pos  = get_option( 'origami_footer_pos', 'right' );
?>
<footer class="ori-footer">
    <section id="scroll-top" class="btn btn-action">
        <i class="icon icon-arrow-up"></i>
    </section>
    <div class="ori-container columns <?php echo $footer_pos; ?>">
        <section class="ori-copyright col-4">
			<?php echo $footer_text; ?>
            <!--
		    <span class="my-face">(っ•̀ω•́)っ✎⁾⁾ </span>不知不觉中已经运行了</br>
		    <span id="timeDate">1天</span>
		    <span id="times">1小时1分1秒</span>
		    <br/>
		    Theme - <a href="https://github.com/syfxlin/origami/">Origami</a> By
		    <a href="https://www.ixk.me/"> Otstar Lin </a>
		    <br/>
		    <a href="https://beian.miit.gov.cn/" target="_blank">闽ICP备2023003928号-1</a>
		    <br/>
		    <span id="origami-theme-info">
			    Theme - <a href="https://blog.ixk.me/theme-origami.html">Origami</a> By
			    <a href="https://www.ixk.me"> Otstar Lin </a>
		    </span>
		    -->
            <!--
		    <div class="foot-ellipsis">>
                <span class="my-face ftspan2 fa fa-arrow-right"></span>
                <span class="ftspan" style="padding-right: 3px;">
                    <i class="fa fa-paper-plane"></i>
                </span>
                <a href="https://github.com/syfxlin/origami/" target="_blank" rel="external nofollow noopener noreferrer">
                    <span class="ftspan1">Origami</span>
                </a>
                <span class="ftspan" style="padding-right: 3px;">
                    <i class="fa fa-user"></i>
                </span>
                <a href="https://www.ixk.me/" target="_blank" rel="external nofollow noopener noreferrer">
                    <span class="ftspan1">Otstar Lin</span>
                </a>
                <a href="https://icp.gov.moe/?keyword=20230711" target="_blank" rel="external nofollow noopener noreferrer">
					<span class="ftspan" style="padding-right: 2px;">
						<i class="fa fa-paw"></i>
					</span>
					<span class="ftspan1" title="萌国ICP备案">萌ICP备20230711号</span>
				</a>
                <a href="https://beian.miit.gov.cn/" target="_blank" rel="external nofollow noopener noreferrer">
					<span class="ftspan" style="padding-right: 2px;">
						<i class="fa fa-university"></i>
					</span>
					<span class="ftspan1" title="ICP备案号">闽ICP备2023003928号-1</span>
				</a>
                <span class="my-face ftspan2 fa fa-arrow-left" style="margin-left: 10px;"></span>
                <br>
            </div>
            -->
            <br/>
            <span id="origami-theme-info"></span>
        </section>
    </div>
</footer>
<?php get_template_part( 'template-part/tools' ); ?>
<?php wp_footer(); ?>
</body>

</html>
