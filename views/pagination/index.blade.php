<div class="row">
    <ul  class="pager">

        <?php

        if ($paginate->page_total() > 1){

            if ($paginate->has_next()) {

                echo "<li class='next'><a href='/?page={$paginate->next()}'>Next</a></li>";

            }

            for ($i=1; $i<=$paginate->page_total();$i++){

                if ($i == $paginate->current_page){

                    echo "<li class='active'><a id='kao' href='/?page={$i}'>{$i}</a></li>";

                } else {

                    echo "<li class=''><a href='/?page={$i}'>{$i}</a></li>";

                }

            }

            if ($paginate->has_previous()) {

                echo "<li class='previous'><a href='/?page={$paginate->previous()}'>Previous</a></li>";

            }

        }

        ?>
    </ul>
</div>
