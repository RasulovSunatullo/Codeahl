<?php

ob_start();

define('API_KEY','7665205267:AAFDbxYcZQ0C3Mnl3srar02tAdAVQlKed3w');

$admin = "-1002451413873";

$kanal = "@PHPMARKET"; 

//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////

   function del($nomi){

   array_map('unlink', glob("$nomi"));

   }

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



$data = $uzard->callback_query->data;

$cmid = $uzard->callback_query->message->message_id;

$ccid = $uzard->callback_query->message->chat->id;

$cuid = $uzard->callback_query->message->from->id;

$qid = $uzard->callback_query->id; 



$ctext = $uzard->callback_query->message->text; 

$callfrid = $uzard->callback_query->from->id; 

$callfrusername = $uzard->callback_query->from->username; 

$callfname = $uzard->callback_query->from->first_name;  

$calltitle = $uzard->callback_query->message->chat->title; 

$calluser = $uzard->callback_query->message->chat->username; 



$uzard = json_decode(file_get_contents('php://input'));

$message = $uzard->message;

$mid = $message->message_id;

$cid = $message->chat->id;

$callback = $uzard->callback_query;    

$data = $uzard->callback_query->data;  

$cid2 = $uzard->callback_query->message->chat->id;  

$mesid = $uzard->callback_query->message->message_id;

$tx = $message->text;

$name = $message->from->first_name;

$user = $message->from->username;

$reply = $message->reply_to_message->text;

//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////

$type = $message->chat->type;

$text = $message->text;

$uzard = json_decode(file_get_contents('php://input'));

$message = $uzard->message;

$mid = $message->message_id;

$cid = $message->chat->id;

$fid = $message->from->id;

$callback = $uzard->callback_query;    

$data = $uzard->callback_query->data;  

$cid2 = $uzard->callback_query->message->chat->id;  

$mesid = $uzard->callback_query->message->message_id;

$tx = $message->text;

$name = $message->from->first_name;

$user = $message->from->username;

$reply = $message->reply_to_message->text;

$rpl = json_encode([

           'resize_keyboard'=>false,

            'force_reply' => true,

            'selective' => true

        ]);

         $key = json_encode([

'resize_keyboard'=>true,

'keyboard'=>[

[['text'=>"📨 Хабар Фиристодан"]],

[['text'=>"📊 Шумораи Азоён"],['text'=>"🌐 Маълумот"]],

]

]);

//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////

if($tx=="/start" or $tx=="🔙Ба кафо"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"👋Салом: $name

🔹Ба Боти Шахсии @TAJ_MIR Хуш Омадед!!!🌟

🔹Саволи худро нависед ва админ чавоб медихад!!!🌟

🔹Мархамат менюи лозимии дар поён бударо интихоб кунед!!!🌟",

'reply_markup'=>$key,

]);

}

//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////

 $gett = bot('getChatMember',[

  'chat_id' =>$kanal,

  'user_id' => $fid,

  ]);

  $gget = $gett->result->status;



  $gets = bot('getChatMember',[

  'chat_id' =>$kanal1,

  'user_id' => $fid,

  ]);

  $getss = $gets->result->status;

$type = $message->chat->type;

$lichka = file_get_contents("users.db");

if($type == "private"){

    if(strpos($lichka,"$cid") !==false){

    }else{

        file_put_contents("users.db","$lichka\n$cid");

    }

}

$lich = substr_count($lichka,"\n");

$soat = date('H:i:s', strtotime('2 hour'));

$bugun = date('d-M Y',strtotime('2 hour'));

if($tx == "📊 Шумораи Азоён"){

    bot('sendmessage',[

        'chat_id'=>$cid,

        'text'=>"✌Асалом мухтарам: $name

🔹Статистикаи бот:

👤 Азоён: $lich то✅

💻Кодер: @CodernPHP ✅

🔹Дар Точикистон соат: $soat ✅

🔹Имруз: $bugun -сол✅

Ба каналамон обуна шавед - @TAJIK_WALKER",

        'parse_mode'=>'html',

    ]);

}



//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////

if($tx=="📨 Хабар Фиристодан"){

    bot('sendmessage',[

        'chat_id'=>$cid,

        'text'=>"Мархамат саволатонро нависед!",

'reply_markup'=>$rpl,

        ]);

}

if($reply=="Мархамат саволатонро нависед!"){

   bot('Sendmessage',[

   'chat_id'=>$admin,

   'text'=>"<b>Саволи нав!</b>



 🔷User:@$user



🔢Id:<code>$cid</code>



<b>Саволаш: $tx</b>",

'parse_mode'=>"html",

]);

sleep(1);

bot('Sendmessage',[

'chat_id'=>$cid,

'text'=>"🔹*Мухтарам*: $name

🔹*Саволатон ба админ расонида шуд!! Дар наздиктарин вакт админ ба шумо медиҳад!*",

'parse_mode'=>"markdown",

'reply_markup'=>$key,

]);

}

if((mb_stripos($tx,"/text") !== false) and $cid==$admin){ 

$ex = explode("=",$tx);

bot('SendMessage',[

'chat_id'=>$ex[1],

'text'=>"💬АЗ АДМИН ХАБАР🌟

➖➖➖➖➖➖➖➖➖➖➖

$ex[2]",

]);

bot('SendMessage',[

'chat_id'=>$cid,

'text'=>"Ба [💼Истифодабаранда](tg://user?id=$ex[1])  хабаратон рои карда шуд:

Хабари шумо рои карда:

$ex[2]",

'parse_mode'=>'markdown',

]);

}

if($tx == "🌐 Маълумот"){

$time=date('H:i:s',strtotime('2 hour'));

$sana=date("d.m.Y",strtotime("2 hour"));

$haf = date('N',strtotime('2 hour'));

$haft="1Dushanba1 2Seshanba2 3Chorshanba3 4Payshanba4 5Juma5 6Shanba6 7Yakshanba7";

$ex=explode("$haf",$haft);

$haftab="$ex[1]";

$okun=date("n");

$oynoms = "1Yanvar1 2Fevral2 3Mart3 4Aprel4 5May5 6Iyun6 7Iyul7 8Avgust8 9Sentyabr9 10Oktyabr10 11Noyabr11 12Dekabr12";

$ex2 = explode("$okun",$oynoms);

$oyb = "$ex2[1]";

$sana2 = date('z', strtotime('2 hour'));

$anb8 = file_get_contents('https://obhavo.uz/termez'); $ex1=explode("n",$anb8);

$obh = file_get_contents('https://fa.weather.town/uz/forecast/uzbekistan/surxondaryo-viloyati/tirmiz/');

$ex = explode('title="Харорати хаво"',$obh);

$exi = explode('right-container',$ex[1]);

$ubk = str_replace($exi[1],' ',$ex[1]);

$ubk1 = str_replace('dir="ltr">',' ',$ubk);

$ubk2 = str_replace('<div class="informer-main-page__container fleft right-container',' ',$ubk1);

$ubk3 = str_replace('&deg;C</div>',' ',$ubk2);

$ubk4 = str_replace('</div>',' ',$ubk3);

$obhavo = trim("$ubk4");

$buoy = date('t', strtotime('2 hour'));

//соли нав

$kunr = date('z',strtotime('2 hour')); 

$i = 364;

$s2 = $i-$kunr;

$kunr = date('z',strtotime('2 hour')); 

$i = 364;

$s2 = $i-$kunr;

$kunu = date('z',strtotime('2 hour')); 

$t = 247;

$m2 = $t-$kunu;

//ҳафта

$kun1 = date('H',strtotime('2 hour')); 

$soati = 23;

$soat1 = $soati-$kun1;

$kun2 = date('i',strtotime('2 hour')); 

$minuti = 59;

$minut = $minuti-$kun2;

$kun3 = date('s',strtotime('2 hour')); 

$sekundi = 59;

$sekund = $sekundi-$kun3;

//то мактаб

$kun1 = date('H',strtotime('2 hour')); 

$kuni = 244;

$mkun = $kuni-$kun1;

$kun2 = date('H',strtotime('2 hour')); 

$soati = 24;

$msoat = $soati-$kun2;

$kun3 = date('i',strtotime('2 hour')); 

$minuti = 59;

$mminut = $minuti-$kun3;

$kun4 = date('s',strtotime('2 hour')); 

$sekundi = 59;

$msekund = $sekundi-$kun4;

bot('sendMessage',[

'chat_id'=>$cid,

'text'=>"🇹🇯 *Дар Точикистон соат:⏰$time ⏰*

🔹📅*Имруз: $sana 📅*

🔹📆*Рузи хафта-$haftab 

🔹🪧*Номи мох-$oyb !*

🔹🌒*Ин мох аз $buoy руз иборат!*⏳

🔹❄*То соли нав  📅$s2 Руз ☃️$soat1 Соат⏰ 🎅$minut Минут 🎁$sekund Секунд монд!*⌛

🔹🌚*То рузи дигар: ⏰$soat1-Соат⏰,🌷$minut-Минут🥀, 🕥 $sekund-Секунд монд!*⌛

",

'parse_mode'=>'markdown',

'reply_markup'=>$key,

]);

}

//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////

$gruppa = file_get_contents("gruppa.db");

$lichka = file_get_contents("lichka.db");

$gr = substr_count($gruppa,"\n"); 

$us = substr_count($lichka,"\n"); 

$obsh = $gr + $us;





$gruppa = file_get_contents("gruppa.db");

$lichka = file_get_contents("lichka.db");

$xabar = file_get_contents("xabarlar.txt");

if($type==$channel){

if(strpos($gruppa,"$channel_id") !==false){

}else{

file_put_contents("gruppa.db","$gruppa\n$channel_id");

}

}

if($type=="private"){

if(strpos($lichka,"$cid") !==false){

}else{

file_put_contents("lichka.db","$lichka\n$cid");

}

} 



if($tx=="/send" and $cid==$admin){

  bot('sendmessage',[

    'chat_id'=>$admin,

    'text'=>"Хабаратонро нависед!

Ба кафо - /cancel",

    'parse_mode'=>"html",

]);

    file_put_contents("xabarlar.txt","user");

}

if($xabar=="user" and $cid==$admin){

if($tx=="/cancel"){

  file_put_contents("xabarlar.txt","");

}else{

  $lich = file_get_contents("lichka.db");

  $lichka = explode("\n",$lich);

  foreach($lichka as $lichkalar){

  $okuser=bot("sendmessage",[

    'chat_id'=>$lichkalar,

    'text'=>$text,

    'parse_mode'=>'html'

]);

}

if($okuser){

  bot("sendmessage",[

    'chat_id'=>$admin,

    'text'=>"Хабар ба хама фиристода шуд!",

    'parse_mode'=>'html',

]);

  file_put_contents("xabarlar.txt","");

}

}

}

//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////

if(isset($tx)){

  $gett = bot('getChatMember',[

  'chat_id' =>$kanal,

  'user_id' => $fid,

  ]);

  $gget = $gett->result->status;



  $ggett = bot('getChatMember',[

  'chat_id' =>$kanal1,

  'user_id' => $fid,

  ]);

  $ggeet = $ggett->result->status;



  if($gget == "member" or $gget == "creator" or $gget == "administrator" and $ggeet == "member" or $ggeet == "creator" or $ggeet == "administrator"){



    }else{

    bot('deleteMessage',[

      'chat_id'=>$cid,

      'message_id'=>$mid,

          ]);

    bot('sendMessage',[

      'chat_id'=>$cid,

      'parse_mode'=>'html',

      'text'=>"😕Мухтарам [$name](tg://user?id=$fid) барои аз бот истифода бурдан шумо ба каналҳо обуна шуданатон шарт❗️",

'parse_mode'=>'markdown',

'reply_markup' => json_encode([

                'inline_keyboard'=>[

                   [['text'=>'📡Обунашави','url'=>'https://t.me/TAJIK_WALKER']],

[['text'=>'Обунашави','url'=>'https://t.me/PHPMARKET']],

]

])

    ]);

  }

}

//////////////////////////////////////////////////TAJIK_WALKER//////////////////////////////////////////////////
