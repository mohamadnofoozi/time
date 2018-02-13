///@NoFooZiTM///
///creator: mohamad nofoozi//
//timer///
/DEV /// SAMIYAR///
کپی کردن این سورس بدون منبع پیگرد 
قانونی دارد 
@NoFooZiTM

<?php

define('API_KEY', '397277897:AAEfJB3KOL-jahsuARGt_L9o1-Ku08KD7j4');

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
 } 
function sendAction($chat_id, $action){
    makereq('sendChataction',[
        'chat_id'=>$chat_id,
        'action'=>$action
        ]);
}
function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
//-//////
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message = $update->message; 
//$chat_id = $message->chat->id;
$chat_id = $update->message->chat->id;
$text = $message->text;
$from_id = $update->message->from->id;
$firstname = $message->from->first_name;
$lastname = $message->from->last_name;
$username = $message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$message_id = $update->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$time=json_decode(file_get_contents("http://irapi.ir/time/"));
$entime=$time->ENtime;
$endate=$time->ENdate;
$fatime=$time->FAtime;
$fadate=$time->FAdate;
$textmil = "شمسی";
$textmill = "میلادی";
//---------------//

$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@ایدی کانال&user_id=".$from_id); 
if(strpos($inch , '"status":"left"') == true ) { 
var_dump(bot('sendMessage',[ 
        'chat_id'=>$update->message->chat->id, 
        'text'=>"🔸برای حمایت از ما و همچنان از ربات ابتدا وارد کانال زیر شوید👇
🆔 @ایدی کانال
🔹روی عبارت join بزنید سپس به ربات برگشته و گزینه
🔸 /start
🔹را ارسال کنید تا دکمه های ربات نمایش داده شوند.", 
 'parse_mode'=>'MarkDown', 
        'reply_markup'=>json_encode([ 
            'inline_keyboard'=>[ 
                [ 
                    ['text'=>"ورود به کانال",'url'=>"https://telegram.me/ایدی کانال"] 
                ] 
            ] 
        ]) 
    ])); 
}

elseif($text=="/start" or $text=="شروع"){
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>"http://s9.picofile.com/file/8319160042/photo_2018_02_11_21_29_43.jpg",
'caption'=>"سلام من ربات TIMER😊 هستم
و میتونم کار های زیر انجام بدم
نشان دادن ساعت و تاریخ به نوع های زیر 
☢ شمسی
☢ میلادی
☎️ بزودی ربات آپدیت میشود و امکانات دیگری هم به من اضافه میشه😀
آیدی من 
T.me/TimerNofooziBot",
 'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
	[['text'=>"⏰ شمسی 📅",'callback_data'=>"shamsi"]],
[['text'=>"⏰ میلادی 📅",'callback_data'=>"miladi"]],
[['text'=>"کانال من 📖",'url'=>"http://t.me/pikavps"]],
[['text'=>"راهنما",'callback_data'=>"/jock"],['text'=>"ساخت لوگو",'callback_data'=>"logo"]]
]])
	]);
	}
elseif($data == 'shamsi'){
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"`ساعت به وقت ایران 🇮🇷`
`$fatime`
`نوع ساعت ` `$textmil`
〰〰〰〰〰〰〰〰〰
`تاریخ `
`$fadate`
〰〰〰〰〰〰〰〰\n **NoFooZiTM**",
 'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
	[['text'=>"$fatime",'callback_data'=>"s"]],
[['text'=>"$fadate",'callback_data'=>"m"]]]])
	]);
	}
elseif($data == 'miladi'){
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"`ساعت به وقت ایران 🇮🇷`
`$entime`
`نوع ساعت ` `$textmill`
〰〰〰〰〰〰〰〰〰
`تاریخ `
`$endate`
〰〰〰〰〰〰〰〰\n **NoFooZiTM**",
 'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
	[['text'=>"$entime",'callback_data'=>"o"]],
[['text'=>"$endate",'callback_data'=>"h"]]]])
	]);
	}

elseif($text == "/jock"){
$jok = file_get_contents("https://api.bot-dev.org/jock/");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
$jok

‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾",
 'parse_mode'=>"MarkDown"
 ]);    
  }
elseif($data == "/jock"){
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"$jok",
 'parse_mode'=>"MarkDown"
 ]);    
            }

?>
///@NoFooZiTM///
///creator: mohamad nofoozi//
//timer///
/DEV /// SAMIYAR///
کپی کردن این سورس بدون منبع پیگرد 
قانونی دارد 
@NoFooZiTM
