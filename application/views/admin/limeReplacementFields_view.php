<script language="javascript">
    function Ok()
    {
        var sValue = document.getElementById('cquestions').value ;

        FCKLimeReplacementFieldss.Add( sValue ) ;
        return true ;
    }
</script>
<div class="form-group">
    <?php
    if (count($replFields) > 0 || isset($cquestions) )
    {
        $InsertansUnsupportedtypes= Yii::app()->getConfig('InsertansUnsupportedtypes');
        ?>
        <select name='cquestions' id='cquestions' size='14' style='width:390px' ondblclick="$('.cke_dialog_ui_button_ok').children().click();" class='form-control'>
            <?php
            $noselection = false;
        }
        else
        {
            eT("No replacement variable available for this field");
            $noselection = true;
        }

        if (count($replFields) > 0)
        {
            ?>
            <optgroup label='<?php eT("Standard Fields");?>'>
                <?php

                foreach ($replFields as $stdfield)
                {
                    ?>
                    <option value='<?php echo $stdfield[0];?>' title='<?php echo $stdfield[1];?>'><?php echo $stdfield[1];?></option>
                    <?php
                }
                ?>
            </optgroup>
            <?php
        }

        if (isset($cquestions))
        {
            ?>
            <optgroup label='<?php eT("Previous answer fields");?>'>
                <?php
                foreach ($cquestions as $cqn)
                {
                    $isDisabled="";
                    if (in_array($cqn[2],$InsertansUnsupportedtypes))
                    {
                        $isDisabled=" disabled='disabled'";
                    }
                    elseif ($cqn[4] === false)
                    {
                        $isDisabled=" disabled='disabled'";
                    }
                    ?>
                    <option value='INSERTANS:<?php echo $cqn[3];?>' title='<?php echo $cqn[0];?>' <?php echo $isDisabled;?>><?php echo $cqn[0];?></option>
                    <?php
                }
                ?>
            </optgroup>
            <?php
        }

        if ($noselection === false)
        {
            ?>
        </select>
        <?php
    }
    ?>
    <?php
    if (isset($surveyformat))
    {
        ?>
        <div class="panel panel-default">
            <?php
            switch ($surveyformat)
            {
                case 'A':
                    ?>
                    <div class="panel-body">

                        <br />
                        <font color='orange'><?php eT("Some Question have been disabled");?></font>
                        <br />
                        <?php echo sprintf(gT("Survey Format is %s:"), gT("All in one"));?>
                        <br />
                        <i><?php eT("Only Previous pages answers are available");?></i>
                        <br />
                    </div>
                    <?php
                    break;
                case 'G':
                    ?>
                    <div>
                        <br />
                        <font color='orange'><?php eT("Some Question have been disabled");?></font>
                        <br /><?php echo sprintf(gT("Survey mode is set to %s:"), gT("Group by Group"));?>
                        <br/><i><?php eT("Only Previous pages answers are available");?>
                        </i><br />
                    </div>
                    <?php
                    break;
            }?>
        </div>
        <?php
    }
    ?>
</div>
