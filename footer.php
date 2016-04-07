  <footer <?php if(is_index($this->options->siteUrl)) {_e('style="display:none;"');} ?>>
    <div class="container">
      <div class="support">
        <img src="//assets.qiniu.com/qiniu-122x65.png" alt="七牛云存储" />
      </div>
      <div class="themeauthor">
        Theme Materialized-X by BangZ / Powered by <a href="http://typecho.org/">Typecho)))</a>
      </div>
      <div class="lawinfo">
        &copy; <?php _e(date('Y'))?>&nbsp;<?php $this->options->title()?> 沪ICP备13002172号-3
      </div>
      <div class="social">
        <a href="//github.com/istobran"><i class="fa fa-github"></i></a>
        <a href="//twitter.com/istobran"><i class="fa fa-twitter"></i></a>
        <a href="//www.v2ex.com/member/monolight"><i class="fa fa-vimeo"></i></a>
        <a href="//steamcommunity.com/profiles/76561198094522692"><i class="fa fa-steam"></i></a>
        <a href="//google.com/+BangZ-CN"><i class="fa fa-google-plus"></i></a>
      </div>
    </div>
  </footer>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script type="text/javascript" src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.bootcss.com/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <?php $this->footer();?>
  <script type="text/javascript" src="<?php $this->options->themeUrl('js/main.js');?>"></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('js/text-autospace.min.js');?>"></script>
</body>
</html>
