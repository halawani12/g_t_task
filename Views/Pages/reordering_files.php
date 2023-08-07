<?php

?>


<div class="container p-4">

    <div class="text-center ">
        <div class="mt-3 mb-3">
            <img class="rf-img" src="<?= $configMain::getPublicUrl() ?>images/Tamatem-Logo.svg">
        </div>

        <div>
            <h4>
                Tamatem Task
            </h4>
        </div>
    </div>

    <div class="card mt-4 mb-4">
        <h5 class="card-header">Reordering Files</h5>
        <div class="card-body">
            <p class="card-text">Reordering languages files and set file in right folder </p>
            <div class="text-center">
                <button type="button" id="reorderingFilesBtn" href="#" class="btn btn-success" title="Reordering">Reordering</button>

            </div>
        </div>
    </div>




</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#reorderingFilesBtn').click(function(){
            $.ajax({
                type:'GET',
                url:'<?= $configMain::getMainUrl()."Actions/LangFiles/ReorderingFilesAction.php" ?>',
                success:function(dataRes){
                    let dataResObj = JSON.parse(dataRes);
                    alert(dataResObj.msg);
                },
                error:function (dataRes) {
                    let dataResObj = JSON.parse(dataRes);
                    alert(dataResObj.msg);
                },
            });
        });
    });
</script>