<?php $pager->setSurroundCount(5) ?>
<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
     <ul class="pagination">
          <?php if ($pager->hasPrevious()) : ?>
               <li class="paginate_button previous" id="example1_previous">
                    <a style="border-bottom: 2px solid #C9302C !important;" href="<?= str_replace('auth/login/', '', $pager->getPrevious()); ?>" aria-label="<?= lang('Pager.previous'); ?>" aria-controls="example1" data-dt-idx="0" tabindex="0"><i class="fa fa-angle-double-left"></i>
                    </a>
               </li>
          <?php endif; ?>

          <?php foreach ($pager->links() as $link) : ?>
               <li class="paginate_button">
                    <a style="border-bottom: 2px solid #337AB7 !important; <?= $link['active'] ? 'background-color: #337AB7 !important; color: #fff !important;' : ''; ?>" href="<?= str_replace('auth/login/', '', $link['uri']); ?>" aria-controls="example1" data-dt-idx="1" tabindex="0">
                         <?= $link['title']; ?>
                    </a>
               </li>
          <?php endforeach; ?>

          <?php if ($pager->hasNext()) : ?>
               <li class="paginate_button previous" id="example1_previous">
                    <a style="border-bottom: 2px solid #C9302C !important;" href=" <?= str_replace('auth/login/', '', $pager->getNext()); ?>" aria-label="<?= lang('Pager.next'); ?>" aria-controls="example1" data-dt-idx="0" tabindex="0"><i class="fa fa-angle-double-right"></i>
                    </a>
               </li>
          <?php endif; ?>
     </ul>
</div>