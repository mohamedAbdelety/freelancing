<!--- Start preventing guests from being here ---> 
<?php $pageTitle ="Look For A Job "; include("includes/header.inc.php");  if(!isset($_SESSION['userType'])){header("Location: index.php"); exit;} ?>
<!--- End preventing guests from being here ---> 

<!--- Start including ---> 
<link rel="stylesheet" href="assets/css/rangeInput.css">
<link rel="stylesheet" href="assets/css/skillSelect.css">
<link rel="stylesheet" href="http://propeller.in/components/button/css/button.css">
<link rel="stylesheet" href="http://propeller.in/components/typography/css/typography.css">
<link rel="stylesheet" href="http://propeller.in/components/button/css/button.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="http://propeller.in/components/icons/css/google-icons.css">
<link rel="stylesheet" href="http://propeller.in/components/card/css/card.css">
<link rel="stylesheet" href="http://propeller.in/components/custom-scrollbar/css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="http://propeller.in/components/custom-scrollbar/css/pmd-scrollbar.css">
<link rel="stylesheet" href="http://propeller.in/components/badge/css/badge.css">
<link rel="stylesheet" href="http://propeller.in/components/checkbox/css/checkbox.css">
<link rel="stylesheet" href="http://propeller.in/components/radio/css/radio.css">
<script type="text/javascript" src="http://propeller.in/components/textfield/js/textfield.js"></script>
<script type="text/javascript" src="http://propeller.in/components/select2/js/select2.full.js"></script>
<script type="text/javascript" src="http://propeller.in/components/select2/js/pmd-select2.js"></script>
<script type="text/javascript" src="http://propeller.in/components/button/js/ripple-effect.js"></script>
<script src="http://propeller.in/components/range-slider/js/wNumb.js"></script>
<script src="http://propeller.in/components/range-slider/js/nouislider.js"></script>
<script type="text/javascript" language="javascript" src="http://propeller.in/components/custom-scrollbar/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="http://propeller.in/components/checkbox/js/checkbox.js"></script>
<script type="text/javascript" src="http://propeller.in/components/radio/js/radio.js"></script>
<!--- End including  ---> 

<!--- Start some css classes ---> 
<style>
    .right              {float:right;}
    .left               {float:left;}
    .maringZeroizer     {margin:0px;}
    .centerAlignment    {margin:0px auto;text-align: center;}
    .dudeGetOfMe        {margin-bottom:20px;}  
    .avaiableWidthTaker {width:100%;}
    ._5050              {width:50%;}
    .inlineblock        {display:inline-block;} 
    .labelEnhancerX1_2  {font-size:1.2em;}
    .labelEnhancerX1_5  {font-size:1.5em;}
    .labelEnhancerX2    {font-size:2em;}
    .bottomBorderOnly   {border-top:0px;border-top-width:0px;  border-right:0px;border-right-width:0px;  border-left:0px;border-left-width:0px}
    .I                  {font-style: italic;font-family: cursive;}
</style>
<!--- End some css classes ---> 

<!--- Start Crafting some Components --->
<?php
function generateCard($clientName,$clientImage,$clientProfile,$jobTitle,$requiredSkills,$creationDate,$dueDate,$disc,$fixed,$hoursAmount,$price,$jobPage,$currency)
{
    $typeLabel;
    if($fixed){$typeLabel='<span class="left label label-danger material-label material-label_danger material-label_xs">Fixed</span>';}
    else{$typeLabel='<span class="left label label-warning material-label material-label_warning material-label_xs">'.$hoursAmount.' Hours</span>';}
    $priceLabel='<span class="right label label-info material-label material-label_info material-label_xs">'.$price.'  '.$currency.'</span>';
    if(in_array($clientImage,array('""','""',""," "))){$clientImage="https://i0.wp.com/digiday.com/wp-content/uploads/2012/02/anonymousperson.gif?resize=1440%2C738&ssl=1";}    
    $html ="";
    $html.='<div class="pmd-card pmd-z-depth inlineblock" style="width:30%;margin:10px 1.5%">';
    $html.='    <div class="pmd-card-body" >';
    $html.='      <div class="pmd-scrollbar mCustomScrollbar" data-mcs-theme="minimal-dark" >';
    $html.='            <div class="pmd-chip pmd-chip-contact" style"min-height:40px;min-height:700px;">';
    $html.='                <img src ="'. $clientImage .'" alt="avatar">'.$clientName.'<a class="pmd-chip-action" href="'.$clientProfile.'" alt="Open Profile"><i class="material-icons">note</i></a>';
    $html.='            </div>';
    $html.='            <div class="pmd-card-title">';
    $html.='                <h3 class="pmd-card-title-text dudeGetOfMe">'.$jobTitle.'</h3>';
    $html.='                <div>';
    $html.='                    '.$typeLabel;
    $html.='                    '.$priceLabel;
    $html.='                    <div class="clearfix"></div>';
    $html.='                </div>';
    $html.='            </div>	';
    $html.='            <div class="pmd-card-body">';
    $html.='                <span class="pmd-card-subtitle-text">Creation Date :  '.$creationDate.'</span><br>';
    $html.='                <span class="pmd-card-subtitle-text">Due Date      :  '.$dueDate.     '</span><hr>';
    $html.='                <div class="" style="width:100%:display:block"><span class="label label-default material-labe">Required Skills</span>';
    $html.='                    <ul style:"display:block:width:100%:margin-right:80%">';
    foreach($requiredSkills as $skill)
    {$html.='                        <li style:"width:100%;display:block">'.$skill.'</i>';}
    $html.='                    </ul>';
    $html.='                </div><hr>';
    $html.='                    <div>';
    $html.='                        '.$disc;
    $html.='                    </div>';
    $html.='            </div>';
    $html.='        </div>';
    $html.='    </div>';
    $html.='    <div class="pmd-card-actions">';
    $html.='        <a href="'.$jobPage.'"><button class="btn pmd-btn-flat btn-primary btn-block pmd-ripple-effect" type="button">Show Full Page</button></a>';
    $html.='    </div>';
    $html.='</div>';
    echo $html;
}

?>
<!--- End Crafting some Components ---> 

<!---Start HTML --->
<div id=containerr>
    <!--Start Controls-->
    <script>document.getElementById("containerr").style.cssText="width:"+(screen.width-40)+"px;margin:10px 20px;padding:20px";</script>
    <div class=controlsContainer>
        <form action= "<?php echo $_SERVER["PHP_SELF"] ?>"  method="GET">
           
            <div class="form-group materail-input-block materail-input-block_primary materail-input_slide-line dudeGetOfMe">
                <input name="jobTitle" class="form-control materail-input" placeholder="Job Title" value="<?php echo isset($_GET['jobTitle']) ?$_GET['jobTitle']:''; ?>">
                <span class="materail-input-block__line"></span>
		    </div>
           
            
           <div class="avaiableWidthTaker dudeGetOfMe">
               <span id="typeSort" class="I inlineblock left maringZeroizer labelEnhancerX1_2"></span>
                <div class="materail-switch materail-switch_primary right" style="display:inline-block">
                    <input name="onlyFixed" class="materail-switch__element" value="true" type="checkbox" id="switch_input">
                    <label class="materail-switch__label" for="switch_input"></label>
                </div>
                <div class="clearfix"></div>
            </div>
            <script>
                setInterval(function(){
                    if(document.querySelector('#switch_input:checked'))
                    {
                        document.getElementById('hContainer').style.cssText = "display:none";
                    }   
                    else
                    {
                        document.getElementById('hContainer').style.cssText = "display:visible"; 
                    }
                },10);
            </script>
            <?php
                if(isset($_GET['onlyFixed'])){echo "<script>document.getElementById('switch_input').click();</script>";}
            ?>
            <div id="hContainer" class="clearfix">
                <div id="pmd-slider-value-rangeh"  class="pmd-range-slider"></div>	
                <div class="row dudeGetOfMe">
                    <div class="range-value col-sm-6">
                        <span id="hvalue-min"></span>
                    </div>
                    <div class="range-value col-sm-6 text-right">
                        <span id="hvalue-max"></span>
                    </div>
                </div>
                <label class="material-radio-group material-radio-group_primary left" for="hASC">
                    <input type="radio" name="hAmountSort" value="ASC" id="hASC" class="material-radiobox"/>
                    <span class="material-radio-group__element material-radio-group__check-radio"></span>
                    <span class="material-radio-group__element material-radio-group__caption I" style="font-weight:400">Ascending sort according to hours amount</span>
                </label>
                <label class="material-radio-group material-radio-group_primary right" for="hDESC">
                    <input type="radio" name="hAmountSort" value="DESC" id="hDESC" class="material-radiobox"/>
                    <span class="material-radio-group__element material-radio-group__check-radio"></span>
                    <span class="material-radio-group__element material-radio-group__caption I" style="font-weight:400">Descending sort according to hours amount</span>
                </label>
            </div>
            <div id="pContainer" class="clearfix">
                <div id="pmd-slider-value-range"  class="pmd-range-slider"></div>	
                <div class="row dudeGetOfMe">
                    <div class="range-value col-sm-6">
                        <span id="value-min"></span>
                    </div>
                    <div class="range-value col-sm-6 text-right">
                        <span id="value-max"></span>
                    </div>
                </div>
                <label class="material-radio-group material-radio-group_primary left" for="pASC">
                    <input type="radio" name="pSort" value="ASC" id="pASC" class="material-radiobox" group="p" />
                    <span class="material-radio-group__element material-radio-group__check-radio"></span>
                    <span class="material-radio-group__element material-radio-group__caption I" style="font-weight:400">Ascending sort according to price</span>
                </label>
                <label class="material-radio-group material-radio-group_primary right" for="pDESC">
                    <input type="radio" name="pSort" value="DESC" id="pDESC" class="material-radiobox" group="p"/>
                    <span class="material-radio-group__element material-radio-group__check-radio"></span>
                    <span class="material-radio-group__element material-radio-group__caption I" style="font-weight:400">Descending sort according to price<?php for($i=1;$i<=12;$i++)echo "&nbsp;"; ?></span>
                </label>
            </div>
            <input hidden value="<?php echo (new Job)->getLowestPrice(); ?>" name=minPrice id="minPriceInput">
            <input hidden value="<?php echo (new Job)->getHighestPrice(); ?>" name=maxPrice id="maxPriceInput">
            <input hidden value="<?php echo (new Job)->getLowestHoursAmount(); ?>" name=minHours id="minHoursInput">
            <input hidden value="<?php echo (new Job)->getHighestHoursAmount(); ?>" name=maxHours id="maxHoursInput">
            <?php
                if(isset($_GET['hAmountSort']))
                {echo "<script> document.getElementById('".($_GET['hAmountSort']==="ASC"? "hASC":"hDESC")."').click();</script>";}
                if(isset($_GET['pSort']))
                {echo "<script> document.getElementById('".($_GET['pSort']==="ASC"? "pASC":"pDESC")."').click();</script>";}
            ?>
            
            
            <div class="form-group pmd-textfield pmd-textfield-floating-label dudeGetOfMe labelEnhancerX2" style="box-shadow:-3px 14px 77px -13px #4092D9">
	            <label class="I" style="margin-bottom:20px;">&nbsp;&nbsp;&nbsp;Click to Choose Skills</label>
	            <select name="reqSkills[]" class="select-tags form-control pmd-select2-tags" multiple>
                    <?php $skills=$Misc->ListAllSkills();foreach($skills as $skill){echo"<option value=" .$skill['name']. ">" .$skill['name'].  "</option>";} ?>
                </select>
            </div>
            
            
            <div class="btn-group centerAlignment dudeGetOfMe" style="width:100%;" >
	            <button id="n2oBtn" class="btn pmd-ripple-effect btn-primary _5050" type="button" style="background-color:#FFF">
                   <span class="marginZeroizer left" style="color:#4285F4">Newer to older </span>
                   <div class="material-checkbox-group material-checkbox-group_primary inlineblock right">
                         <input  id="n2o" value="DESC" type="checkbox" id="checkbox1"  name="timeSort" class="material-checkbox">
                         <label class="material-checkbox-group__label" for="checkbox1"></label>
                    </div>		 
                    <div class="clearfix"></div>
                </button>
                <button id="o2nBtn" class="btn pmd-ripple-effect btn-primary _5050" type="button" style="background-color:#FFF">
                   <span class="marginZeroizer left" style="color:#4285F4">Older to newer</span>
                    <div class="material-checkbox-group material-checkbox-group_primary inlineblock right">
                         <input id="o2n" value="ASC" type="checkbox" id="checkbox1" name="timeSort" class="material-checkbox">
                         <label class="material-checkbox-group__label" for="checkbox1"></label>
                    </div>
                    <div class="clearfix"></div>
                </button>
            </div>
            <?php
                if(isset($_GET['timeSort']))
                {echo "<script> document.getElementById('".($_GET['timeSort']==="ASC"? "o2n":"n2o")."').click();</script>";}
            ?>
            <?php
                if($_SESSION['userType']==='freelancer')
                {
                    echo
                        '<label class="material-radio-group material-radio-group_info" for="con">
                            <input type="radio" name="propCon" id="con" value="con" class="material-radiobox"/>
                            <span class="material-radio-group__element material-radio-group__check-radio"></span>
                            <span class="material-radio-group__element material-radio-group__caption I">View Pending Proposals Only</span>
                        </label><br>';
                }
            ?>
            <label class="material-radio-group material-radio-group_info" for="prop">
                <input type="radio" name="propCon" id="prop" value="prop" class="material-radiobox"/>
                <span class="material-radio-group__element material-radio-group__check-radio"></span>
                <span class="material-radio-group__element material-radio-group__caption I">View Running Contracts Only</span>
            </label>
            <?php
                if(isset($_GET['propCon']))
                {echo "<script> document.getElementById('".($_GET['propCon']==="con"? "con":"prop")."').click();</script>";}
            ?>
            
            <input class="btn pmd-btn-flat btn-primary btn-block pmd-ripple-effect dudeGetOfMe" type="submit" 
            value="<?php echo $_SESSION['userType']==='client'?"View My Jobs":"Search a Job"; ?> ">
        </form>    
    </div>
    <!---End Controls--->
    <div style="height:5px;" class="dudeGetOfMe progress-rounded progress progress-striped pmd-progress"><div class="progress-bar progress-bar-info" style="width: 100%;"></div></div>
    <!--Start Output Section-->
    <div class=outputSection>
        <?php 
            $cardsGetterQuery="";
            if($_SERVER["REQUEST_METHOD"]==="GET")
            {    
                if(!isset($_GET['jobTitle']) &&!isset($_GET['onlyFixed']) && !isset($_GET['hAmountSort']) &&
                   !isset($_GET['minHours']) && !isset($_GET['maxHours']) && !isset($_GET['pSort']) && !isset($_GET['minPrice']) &&
                   !isset($_GET['maxPrice']) && !isset($_GET['reqSkills']) &&!isset($_GET['timeSort']))
                {
                    if($_SESSION['userType']==="freelancer")
                    {
                        $cardsGetterQuery = "SELECT * FROM job WHERE (";
                        $skills= (new Freelancer)->getFreelancerSkills();
                        foreach($skills as $skill){$cardsGetterQuery .= "skills_needed LIKE '%".$skill."%' OR ";}
                        $cardsGetterQuery = substr($cardsGetterQuery,0,strlen($cardsGetterQuery)-3);
                        $cardsGetterQuery.=") AND job.isOpen=1 ORDER BY creation_date DESC;";
                    }
                    else
                    {
                        $cardsGetterQuery = "SELECT * FROM job WHERE job.client_id = ".(new Client)->getUserClientID($_SESSION['userID'])['client_id'].";";
                    }
                }
                else
                {
                    $cardsGetterQuery=(new Job)->getListJobsquery(
                        @ $_GET['jobTitle'],
                        @ $_GET['onlyFixed'],
                        @ $_GET['hAmountSort'],
                        @ $_GET['minHours'],
                        @ $_GET['maxHours'],
                        @ $_GET['pSort'],
                        @ $_GET['minPrice'],
                        @ $_GET['maxPrice'],
                        @ $_GET['reqSkills'],
                        @ $_GET['timeSort'],
                        @ $_GET['propCon']
                    );    
                }
                
            }
            #For Debugging
            echo "<br>".$_SESSION['userType']."<br>"."Query is shown for debugging purposes.You can delete that from line ".__LINE__." in viewJobs.php file."."<br>".$cardsGetterQuery."<br>";
            $cards=(new Job)->getCardsAssociativeArray($cardsGetterQuery);
            foreach($cards as $card)
            {
                generateCard(
                    $card['clientName'],
                    $card['clientImage'],
                    $card['clientProfile'],
                    $card['jobTitle'],
                    $card['requiredSkills'],
                    $card['creationDate'],
                    $card['dueDate'],
                    strlen($card['disc'])>50?(substr($card['disc'],0,50)." ..."):$card['disc'],
                    $card['fixed'],
                    $card['hoursAmount'],
                    $card['price'],
                    $card['jobPage'],
                    "$"
                );
            }
        ?>
    </div>
    <!-End Output Section->
</div>
<!---End HTML --->
<script>
var holder = document.getElementById('typeSort');
setInterval(function(){
    if(document.querySelector('#switch_input:checked'))holder.textContent="Fixed Price";else holder.textContent="Hours Evaluated";
},100);
</script>
<script>
setInterval(function(){
    if(document.querySelector('#n2o:checked'))
    {
        document.getElementById('n2oBtn').style.cssText= "background-color:#2E3150;";
        document.getElementById('o2nBtn').style.cssText= "background-color:#FFF;";
    }
    else if(document.querySelector('#o2n:checked'))
    {
        document.getElementById('o2nBtn').style.cssText= "background-color:#2E3150;";
        document.getElementById('n2oBtn').style.cssText= "background-color:#FFF;";
    }
    else{document.getElementById('n2o').click();}        
},100);
document.getElementById('n2oBtn').onclick = function(){if(!document.querySelector('#n2o:checked')){document.getElementById('o2n').click();}};
document.getElementById('o2nBtn').onclick = function(){if(!document.querySelector('#o2n:checked')){document.getElementById('n2o').click();}};
</script>
<script>
    var pmdSliderValueRange = document.getElementById('pmd-slider-value-range');
    var min = parseInt(" <?php echo (new Job)->getLowestPrice(); ?> ");
    var max = parseInt(" <?php echo (new Job)->getHighestPrice(); ?> ");
	noUiSlider.create(pmdSliderValueRange, 
    {
		start: [ min, max ], 
		connect: true,
        tooltips: [ wNumb({ decimals: 0 }), wNumb({ decimals: 0 }) ],
                  format: wNumb({	decimals: 0,thousand: '',postfix: '',}),
                  range: { 'min': min,'max': max}
	});
	var valueMax = document.getElementById('value-max'),
		valueMin = document.getElementById('value-min');
	pmdSliderValueRange.noUiSlider.on('update', function( values,handle)
    {
		if ( handle) 
        {	
            valueMax.innerHTML = "Maximum Price : " + values[handle];
            document.getElementById('maxPriceInput').value=values[handle];
        }
        else 
        {
            valueMin.innerHTML = "Minimum Price : " + values[handle];
            document.getElementById('minPriceInput').value=values[handle];
        }
	});	
    /*------------------------------------------------------------------------*/
    var pmdSliderValueRangeh = document.getElementById('pmd-slider-value-rangeh');
    var minh = parseInt(" <?php echo (new Job)->getLowestHoursAmount(); ?> ");
    var maxh = parseInt(" <?php echo (new Job)->getHighestHoursAmount(); ?> ");
	noUiSlider.create(pmdSliderValueRangeh, 
    {
		start: [ minh, maxh ], 
		connect: true,
        tooltips: [ wNumb({ decimals: 0 }), wNumb({ decimals: 0 }) ],
                  format: wNumb({	decimals: 0,thousand: '',postfix: '',}),
                  range: { 'min': minh,'max': maxh}
	});
	var valueMaxh = document.getElementById('hvalue-max'),
		valueMinh = document.getElementById('hvalue-min');    
	pmdSliderValueRangeh.noUiSlider.on('update', function( values, handle )
    {
		if ( handle ) 
        {	
            valueMaxh.innerHTML = "Maximum Hours Amount : " + values[handle];
            document.getElementById('maxHoursInput').value=values[handle];
        } 
        else 
        {
            valueMinh.innerHTML = "Minimum Hours Amount : " + values[handle];
            document.getElementById('minHoursInput').value=values[handle];
        }
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		<!-- Select Multiple Tags -->
		$(".select-tags").select2({
			tags: false,
			theme: "bootstrap",
		})
	});
</script>
<?php 
include('includes/footer.inc.php');
?>

