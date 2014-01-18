<?php
namespace System\HTML;

class UserForms{
    public function printLoginForm($checkScript = null){
        $data = '<fieldset style="padding:2px;width:210px;border:1px solid #85BBEF;">
                <legend>Login</legend><form id="noSpaces" action="'.$checkScript.'" method="post">
                Login: <br />
                <input type="text" class="standartField" name="login" size="29" maxlength="100"><br />
                Password: <br />
                <input type="password" class="standartField" name="password" size="30" maxlength="100"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doLogin" value="Anmelden">
                <input type="reset" onfocus="blur();" class="standartSubmit" name="doReset" value="Löschen">
                </form></fieldset>';
        echo $data;
    }
    public function printRegisterForm($checkScript = null){
        $data = '<fieldset style="padding:2px;width:180px;border:1px solid #85BBEF;">
                <legend>Regestrierung</legend><form id="noSpaces" action="'.$checkScript.'" method="post">
                Login: <br />
                <input type="text" class="standartField" name="user" size="30" maxlength="100"><br />
                Password: <br />
                <input type="password" class="standartField" name="passA" size="30" maxlength="100"><br />
                Password wiederhohlen:<br />
                <input type="password" class="standartField" name="passB" size="30" maxlength="100"><br />
                E-Mail:<br/>
                <input type="email" class="standartField" name="mail" size="30" maxlength="100"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doRegister" value="Regestrieren">
                <input type="reset" onfocus="blur();" class="standartSubmit" name="doReset" value="Löschen">
                </form></fieldset>';
        echo $data;
    }
    public function printLogoutForm($checkScript = null){
        $data = '<fieldset style="padding:2px;width:180px;border:1px solid #85BBEF;">
                <legend>Logout</legend><form id="noSpaces" action="'.$checkScript.'" method="post">
                <input type="hidden" class="standartField" name="logout" value="true"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doLogout" value="Logout">
                <input type="reset" onfocus="blur();" class="standartSubmit" name="doReset" value="Löschen">
                </form></fieldset>';
        echo $data;
    }
}
