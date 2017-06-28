<?php
$sudo_palette = array("white", "red", "blue", "green", "yellow", "aqua", "lime", "pink", "darkorange", "magenta");
	
function generadorSudoku()	{
	$n = str_shuffle("123456789");
	$sudoku = str_replace(rand(1, 9), "0", $n);
	return $sudoku;
}
$objSes->fSudoku_Origin($sudo_n = generadorSudoku());
?>
<head>

<style type="text/css">
fieldset{
width: 205px;
}
</style>
</head>

<div id="content">

        <table>
            <tr>
            <td><br/>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
		width="158px" height="158px" preserveAspectRatio="none" viewBox="0 0 158 158" style="float: left; margin: 0 1em .5em 0">
                                <rect x="0" y="0" width="158" height="158" stroke="black" fill="black"/>
				<rect id="sudo_casilla_0_0" x="2"  y="2"  width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{0}] ?>"/>
				<rect id="sudo_casilla_0_1" x="54" y="2"  width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{1}] ?>"/>
				<rect id="sudo_casilla_0_2" x="106" y="2"  width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{2}] ?>"/>
				<rect id="sudo_casilla_1_0" x="2"  y="54" width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{3}] ?>"/>
				<rect id="sudo_casilla_1_1" x="54" y="54" width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{4}] ?>"/>
				<rect id="sudo_casilla_1_2" x="106" y="54" width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{5}] ?>"/>
				<rect id="sudo_casilla_2_0" x="2"  y="106" width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{6}] ?>"/>
				<rect id="sudo_casilla_2_1" x="54" y="106" width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{7}] ?>"/>
				<rect id="sudo_casilla_2_2" x="106" y="106" width="50" height="50" stroke="black" fill="<?php echo $sudo_palette[$sudo_n{8}] ?>"/>
		</svg>
            </td>
            <td>
                <fieldset style="clear: left;"><legend> Controls </legend>
                    
                <table>
                    <tr>
                        <td>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_1" x="0" y="0" width="16" height="16" stroke="black" fill="red"/>
                        </svg> => 1

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_2" x="0" y="0" width="16" height="16" stroke="black" fill="blue"/>
                        </svg> => 2
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_3" x="0" y="0" width="16" height="16" stroke="black" fill="green"/>
                        </svg> => 3
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_4" x="0" y="0" width="16" height="16" stroke="black" fill="yellow"/>
                        </svg> => 4
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_5" x="0" y="0" width="16" height="16" stroke="black" fill="aqua"/>
                        </svg> => 5
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_6" x="0" y="0" width="16" height="16" stroke="black" fill="lime"/>
                        </svg> => 6
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_7" x="0" y="0" width="16" height="16" stroke="black" fill="pink"/>
                        </svg> => 7
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_8" x="0" y="0" width="16" height="16" stroke="black" fill="darkorange"/>
                        </svg> => 8
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_9" x="0" y="0" width="16" height="16" stroke="black" fill="magenta"/>
                        </svg> => 9
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16px" height="16px" preserveAspectRatio="none" viewBox="0 0 16 16">
                                <rect id="sudo_color_0" x="0" y="0" width="16" height="16" stroke="black" fill="white"/>
                        </svg> => 0
                        </td>
                    </tr>
                    <tr>
                        <td> Color active:
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="64px" height="16px" preserveAspectRatio="none" viewBox="0 0 64 16">
                                <rect id="sudo_color_active" x="0" y="0" width="64" height="16" stroke="black" fill="white"/>
                        </svg>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </td>
        </tr>
        </table>
        Sudoku/Rubik : <input class="form-control parsley-validated" type="text" id="intro_sudoku" name="" data-required="true" value="<?php echo $sudo_n ?>" disabled/>
        <input class="form-control parsley-validated" type="hidden" id="intro_sudoku2" name="sudo_mod" data-required="true" value="<?php echo $sudo_n ?>"/>
	<input class="form-control parsley-validated" type="hidden" id="intro_sudoku_repe" name="sudo_origin" data-required="true" value="<?php echo $sudo_n ?>" />
	<input class="form-control parsley-validated" type="hidden" id="validate" name="validate" data-required="true"  value="<?php echo $secret; ?>" >
        <input class="form-control parsley-validated" type="hidden" id="option" name="option" data-required="true"  value="" >
	
	<!--<p style="border: 2px green ridge; background-color: pink; margin: 1em; padding: 1em;" align=justify>
	<strong>Note</strong>:
		For the security code to be valid, you must resolve the sudoku it represents.
                By first clicking on the box of the color that we have to use (will modify the box "active color"),
                And then clicking on the box where we should replace the color (the one that is blank).
	</p>
	-->
</div><!-- id="contenido" -->
