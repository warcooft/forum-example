<div class="post-create">

    <?= form_open('', ['hx-boost' => 'true', 'hx-confirm' => 'Are you sure you want to create a new post?']); ?>
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="card-title">
                    Create a new <?= empty($post_id) ? 'post' : 'reply'; ?>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Message</span>
                    </label>
                    <?= form_hidden('thread_id', set_value('thread_id', $thread_id)); ?>
                    <?= form_hidden('reply_to', set_value('reply_to', $post_id)); ?>
                    <?= form_textarea('body', set_value('body'),  [
                        'class' => 'input input-bordered', 'required' => '',
                        'id' => 'editor', 'data-type' => 'markdown'
                    ]); ?>
                </div>
                <div class="flex justify-center">
                    <div class="btn-group btn-group-horizontal w-full">
                        <button class="btn btn-dark w-1/2"
                            hx-confirm="unset"
                            hx-post="<?= route_to('post-preview'); ?>"
                            hx-target="#editor-preview"
                            hx-swap="innerHTML show:top"
                            data-loading-disable>
                            Preview
                        </button>
                        <button type="submit" class="btn btn-primary w-1/2" data-loading-disable>
                            Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?= form_close(); ?>

    <div id="editor-preview"></div>

</div>