<div class="comments">
  <?php $this->comments()->to($comments); ?>
  <?php if ($comments->have()): ?>
      <div class="comments-area">
        <div class="comments-heading">
          <h3 class="comments-title"><?php $this->commentsNum(_t(' 0 条吐槽'), _t(' 1 条吐槽'), _t(' %d 条吐槽')); ?></h3>
          <h3 class="comments-title-underline"></h3>
        </div>
        <?php $comments->listComments(array(
          'replyWord'=>'<button type="button" class="btn btn-info btn-xs">回复</button>',
        )); ?>
      </div>
  <?php endif; ?>
</div>
