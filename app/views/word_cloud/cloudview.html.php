<div id="cloud" style="width: <?=$cloud->width;?>px; height: <?=$cloud->height;?>px; overflow: scroll;">

    <div id="topBar">
        <a href="/" class="waves-effect waves-light btn orange">Start Over</a> &nbsp
        <a href="/WordCloud/listview/<?=$cloud->id;?>" class="waves-effect waves-light btn green">View Word List</a> <br>
        <h3>CloudID: <?=$cloud->id;?></h3>
        <p>Created <?=$cloud->created;?></p>
    </div>

    <?php foreach($words as $word) {

        // If we have an unpositioned word
        if ($word->top == 0 & $word->left == 0) { }

        $width = $word->right - $word->left;
        $height = $word->bottom - $word->top;

        $color = "blue";
        if ($word->count >= 5) $color = "green";
        if ($word->count >= 10) $color = "yellow";
        if ($word->count >= 15) $color = "red";
    ?>

            <!-- Word Button -->
            <div id="1" style="position: absolute; width: <?=$width;?>px; height: <?=$height;?>px; top: <?=$word->top;?>px; left: <?=$word->left;?>px;">
                <button class="word btn dropdown-button waves-effect waves-light <?=$color;?>" data-activates='dropdown<?=$word->id;?>'><?=$word->name;?></button>
            </div>

            <!-- Dropdown Structure -->
            <ul id='dropdown<?=$word->id;?>' class='dropdown-content' style="z-index: <?=$word->id;?>; margin-top: 30px;">
                <li><a href="#">Count: <?=$word->count;?></a></li>
                <li class="divider"></li>
                <li><a href="https://google.com/#q=<?=$word->name;?>">Google</a></li>
                <li><a href="http://wikipedia.org/wiki/<?=$word->name;?>">Wikipedia</a></li>
                <li><a href="http://dictionary.reference.com/browse/<?=$word->name;?>">Define</a></li>
                <li class="divider"></li>
                <li><a href="#">Remove</a></li>
            </ul>

    <?php } ?>

</div>

<script>
    $("#cloud").scrollTop(<?=$cloud->width / 2;?>);
    $("#cloud").scrollLeft(<?=$cloud->height / 2;?>);
    $(document).ready(function(){
        $("#cloud").offsetHeight  = 3000;
        var elem_top = $("#cloud").offset()['top'];
        console.log(elem_top);
        var viewport_height = $(window).height();

// Scroll to the middle of the viewport
        var my_scroll = elem_top - (viewport_height / 2);
        $(window).scrollTop(my_scroll);
    });
</script>

<script>
</script>