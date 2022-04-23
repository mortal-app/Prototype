<?php /**
 *  ___ ___  ___ _____ ___ _______   _____ ___ 
 * | _ \ _ \/ _ \_   _/ _ \_   _\ \ / / _ \ __|
 * |  _/   / (_) || || (_) || |  \ V /|  _/ _| 
 * |_| |_|_\\___/ |_| \___/ |_|   |_| |_| |___|
 * @link  https://github.com/NotReeceHarris/Prototype
 * @author  NotReeceHarris <https://github.com/NotReeceHarris>
 * @license  GPL-3.0 License 
 * @package  Prototype-utils
 */

/**
 * path
 *
 * @param  mixed $name
 * @return string $path
 */
function path(String $name) {
    global $routes;
    if (isset($routes[$name]['path'])) {
        return $routes[$name]['path'];
    } else {
        throwError('701', 'Sorry the path "' . $name . '" does not exist.');
    }
}

/**
 * redirect
 *
 * @param  string $name
 * @param  array|null $params
 * @param  bool|null $pathName
 * @return redirect $path
 */
function redirect(string $name, bool|null $pathName = true, array|null $params = []) {
    if ($pathName) {
        $path = path($name);
    } else {
        $path = $name;
    }

    if ($params != []) {
        $query = http_build_query($params);
        header("Location: {$path}?{$query}");
    } else {
        header("Location: {$path}");
    }
    exit;
}

/**
 * asset
 *
 * @param  string $name
 * @return string $path
 */
function asset(string $name) {
    return '/../../static/' . $name;
}

/**
 * throwError
 *
 * @param  string $errorCode
 * @param  string $message
 * @return error
 */
function throwError(string $errorCode, string $message) {
    header('HTTP/1.1 ' . $errorCode);
    ?><!DOCTYPE html><html lang=en><meta charset=UTF-8><meta content="IE=edge"http-equiv=X-UA-Compatible><meta content="width=device-width,initial-scale=1"name=viewport><title> <?php echo $errorCode; ?> </title><style>body{background:#1d1d1d;color:#d3d7de;font-family:"Courier new";font-size:18px;line-height:1.5em;cursor:default;width:100%}a{color:#fff}.code-area{position:absolute;min-width:320px;top:45%;left:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);margin-left:30px}.code-area>span{display:block}.error-meme{width:100%;margin:auto}@media screen and (max-width:320px){.code-area{font-size:5vw;min-width:auto;width:95%;margin:auto;padding:5px;padding-left:10px;line-height:6.5vw}}.footer{position:fixed;left:0;bottom:0;width:100%;color:#fff;text-align:center}</style><div class=code-area><span style=color:#d67171;opacity:.7;font-style:italic>/*<br> <?php echo $message; ?> <br>*/<br><br></span><div class=error-meme><span style=font-style:italic;color:#e4e668c2>$error<span style=color:#e0e0e0> = <span style=font-style:italic;color:#fff;opacity:.5>"<?php echo $errorCode; ?>"</span></span></span><br><br><span><span style=color:#e3e668>if </span>( <span style=font-style:italic;color:#e4e668c2>$error</span> <span style=color:#fff>==</span> <span style=font-style:italic;color:#e4e668c2>null</span> ) { </span><span><br><span style=padding-left:15px;color:#cc6060><i style=width:10px;display:inline-block;padding-left:15px></i>return </span><span><span style=color:#fff8a;opacity:.5>"<span style=color:#fff;opacity:.5 id=ret></span>"</span>; </span><span style=display:block>} <span style=color:#e3e668>else</span><span> {</span> </span><span style=padding-left:15px;color:#cc6060><i style=width:10px;display:inline-block></i>die</span><span>(<span style=color:#fff;opacity:.5>"<span style=color:#fff8a;opacity:.5 id=die></span>"</span>); </span></span><span style=display:block>}</span></div></div><div class=footer><p>⚡ Powered by <a href=https://github.com/NotReeceHarris/Prototype>prototype</a></div><script>const die=["(╯°□°）╯︵ ┻━┻","┻━┻＼(｀0´)／┻━┻","༼つಠ益ಠ༽つ ─=≡ΣO))","(눈_눈)","( ͡°益 ͡°)","(ノಠ益ಠ)ノ彡┻━┻","╭∩╮( ͡° ل͟ ͡° )╭∩╮","(ง •̀_•́)ง"],ret=["＼(＾O＾)／","ᕙ(`▽´)ᕗ","( ͡° ͜ ͜ʖ ͡°)","(´⋋‿⋌`)","(Ȍ ͜ʖȌ)","(͠≖ ͜ʖ͠≖)","(｡◕‿‿◕｡)"];document.getElementById("die").innerHTML=die[Math.floor(Math.random()*die.length)],document.getElementById("ret").innerHTML=ret[Math.floor(Math.random()*ret.length)]</script><?php
    die();
}
