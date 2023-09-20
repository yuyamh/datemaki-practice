<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class SamplePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ファイル情報は、手動で保存する。
        // サンプルデータを35件登録。
        Post::create([
            'title' => '第8課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：〜は(な形容詞)/(い形容詞)です
* 学習目標：身の回りの事物の様子、感想が簡単に言える。
* 教材：フラッシュカード、プリント、絵カード、イラスト描く
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyu8kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_8.pdf',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第9課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：理由、会話、(聴解、読み物)
* 学習目標：理由が簡単に説明できる。理由を述べて、誘いを断ることができる。
* 表現：いっしょにいかがですか。金曜日の晩はちょっと...。残念ですが、また今度お願いします。
* 教材：絵カード、FC、DVD、CD
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyu9kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_9.pdf',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第10課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：〜の...に何がありますか。(〜の...)に〇〇があります。
* 学習目標：場所に物があることを説明できる。
* 教材：絵カード、スケッチブック
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongo10kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_10.pdf',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第11課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：会話、課末(聴解、読み物)単語テスト
* 学習目標：手紙や荷物を郵便局から送ることができる。
* 教材：絵カード、DVD、CD、ティッシュ、ゆうパック箱、標問11課、標問用赤ペン、ディクテーション用紙、漢字7・8シート1、カレンダー
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyukyoann11ka/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_11.pdf',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第13課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：(場所)へ(ます形)/(名詞)に行きます。会話、課末(聴解、読み物)
* 学習目標：移動の目的が言える。店で食事の簡単な注文ができる。食事の支払いが別々にできる。
* 語彙：ご注文は?、定食、牛どん、(少々)お待ち ください。、〜で ございます。、別々に
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyu13kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_13.pdf',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第14課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：復習、会話、課末(聴解、問題、読み物)
* 学習目標：タクシーに乗り、運転手に簡単な指示を出し、目的地まで行ける(会話)
* 語彙：信号を右へ曲がってください。 これでお願いします。お釣り、みどり町
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyukyoan14ka/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_14.pdf',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第15課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：(て形)います(習慣) 会話、課末(聴解、読み物)
* 学習目標：映画を見て思い出した自分の家族について話す。
* 表現：ご家族は?
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyu15kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_15.pdf',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第16課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：(て形)います(習慣) 会話、課末(聴解、読み物)
* 学習目標：日常生活の行動を順を追って話せる。人や物、場所などについて簡単な描写説明ができる。
* 教具・教材：絵カード
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyu16kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_16.zip',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第17課 みんなの日本語初級Ⅰ',
            'description' => '## 学習内容
* 学習項目：1.(ない形)ないでください 2.(ない形)なければなりません 3.(ない形)なくてもいいです
* 学習目標：規則や禁止事項が理解できる。しなければならないこと、する必要のないことが確認できる。
* 語彙：覚えます、忘れます、払います、返します、出かけます、脱ぎます、持って 行きます、持って 来ます、心配します、 残業します、出張します、(薬を)飲みます、(おふろに)入ります、大切(な)、大丈夫(な)、危ない、禁煙、 健康保健証、熱、病気、薬、(お)ふろ、上着、下着、2，3日、〜までに、ですから
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongo17kyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_17.zip',
            'level' => 'A1',
            'user_id' => 3,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第27課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.〜が可能動詞、2.〜が見えます/聞こえます、3.〜ができます
* 学習目標：あせらず落ち着いて、ゆっくりやろう
* 教具・教材：絵カード
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnaninihongosyokyudai27jakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_27.pdf',
            'level' => 'A2',
            'user_id' => 3,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第28課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.〜ながら、 2.〜ています
* 学習目標：同時に行われる継続的な動作が言える。日常の習慣的な行為が言える。
* 教具・教材：絵カード、イラスト、高山磁石
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyudai28kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_28.pdf',
            'level' => 'A2',
            'user_id' => 3,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第29課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：会話、課末(聴解、読み物)、クリスマスパーティー
* 学習目標：忘れ物などの困った状況に対応できる。
* 表現：1)〜に忘れ物をしてしまったんですが...。2)〜です。このくらいの...。 3)よく覚えていません。4)えーと、確か〇〇が入っています。
* 教具・教材：絵カード、DVD、CD、写真、新しいことば1と2
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyudai29kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_29.zip',
            'level' => 'A2',
            'user_id' => 3,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第30課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.〜に〜が〜てあります 2.〜は〜に〜てあります
* 学習目標：事物の状態について述べることができる。準備など、将来のために前もってしておくことが述べられる。
* 教具・教材：絵カード、プリント
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyudai30kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_30.pdf',
            'level' => 'A2',
            'user_id' => 3,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第31課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.意向形 2.(意向形)と思っています 3.まだ〜ていません
* 学習目標：自分の意志や計画していることが述べられる。
* 教具・教材：絵カード、イラスト、プリント
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyudai31kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_31.pdf',
            'level' => 'A2',
            'user_id' => 3,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第32課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：〜かもしれません、会話、課末(聴解、読み物)
* 学習目標：健康の話題から近状を話す。
* 表現：元気がありませんね。どうしたんですか。 それはいけませんね。 それはいいですね。
* 教具・教材：絵カード、DVD、CD、プリント、占いカード、デジカメ、USB
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyudai32kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_32.pdf',
            'level' => 'A2',
            'user_id' => 3,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第33課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.命令形 2.禁止形 3.「〜」と書いてあります/読みます
* 学習目標：指示、命令を理解することができる。人の発言を伝えたりすることができる。
* 教具・教材：絵カード、イラスト、プリント、カメラ、ピストル、サングラス、ボール
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/33kyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_33.pdf',
            'level' => 'A2',
            'user_id' => 5,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第34課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：3.〜て/ないで 4.〜ないで、〜
* 学習目標：二つの動作の前後関係を言い表せる。ある動作をどのような状態で行うかを説明することができる。
* 教具・教材：絵カード、イラスト、高山磁石、カメラ
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minniti34kyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_34.zip',
            'level' => 'A2',
            'user_id' => 5,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第36課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.〜ように、2.〜ようになります。
* 学習目標：到達目標や努力目標を述べることができる。
* 教具・教材：漢字テスト、絵カード、イラスト、FC
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minniti36kyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner2_36.pdf',
            'level' => 'A2',
            'user_id' => 5,
            'text_id' => 2,
        ]);
        Post::create([
            'title' => '第18課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.(名詞)/(辞書形)ことができます(能力) 2.(名詞)/(辞書形)ことができます(状況可能)
* 学習目標：できること、できないこと、趣味について簡単に話せる。
* 教具・教材：絵カード、イラスト、あいうえおボード、標問16課、漢字プリント、電子辞書、文型練習帳
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongosyokyu18kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_18.zip',
            'level' => 'A2',
            'user_id' => 5,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => '第19課 みんなの日本語初級Ⅱ',
            'description' => '## 学習内容
* 学習項目：1.(た形)ことがあります 2.(た形)り、(た形)りします 3.(い形容詞(〜い)くなります (な形容詞/名詞)になります
* 学習目標：経験の有無が言える。物事の状況の変化が言える。
* 教具・教材：絵カード、イラスト、漢字プリント、漢字FC、た形FC、文型練習帳、宿題
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/minnanonihongo19kakyoan/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'minnichi_beginner1_19.zip',
            'level' => 'A2',
            'user_id' => 5,
            'text_id' => 1,
        ]);
        Post::create([
            'title' => 'できる日本語 初級1課①',
            'description' => '## 学習内容
* 学習項目：わたしの名前、国、仕事
* 学習目標：簡単に自分のこと(名前・国・趣味など)を話したり相手のことを聞いたりすることができる。
* 教具・教材：プリント、テスト、フラッシュカード、スピーカー、iPad(たんご、国旗PDF)
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyokyukyoan6-19/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_beginner_1ST1.pdf',
            'level' => 'A1',
            'user_id' => 4,
            'text_id' => 13,
        ]);
        Post::create([
            'title' => 'できる日本語 初級2課①',
            'description' => '## 学習内容
* 学習項目：どこですか
* 学習目標：自分が買いたいものかどこにあるか聞くことができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyokyukyoan6-19/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_beginner_2ST1.pdf',
            'level' => 'A1',
            'user_id' => 4,
            'text_id' => 13,
        ]);
        Post::create([
            'title' => 'できる日本語 初級3課①',
            'description' => '## 学習内容
* 学習項目：何時までですか
* 学習目標：公共施設に開館時間や休刊日など問い合わせることができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー、時計
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyokyukyoan6-19/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_beginner_3ST1.pdf',
            'level' => 'A1',
            'user_id' => 4,
            'text_id' => 13,
        ]);
        Post::create([
            'title' => 'できる日本語 初級4課①',
            'description' => '## 学習内容
* 学習項目：どこ?
* 学習目標：自分の国・町の位置や日本までの時間などを言ったり相手に質問したりすることができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyokyukyoan6-19/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_beginner_4ST1.pdf',
            'level' => 'A1',
            'user_id' => 4,
            'text_id' => 13,
        ]);
        Post::create([
            'title' => 'できる日本語 初級5課①',
            'description' => '## 学習内容
* 学習項目：「週末」 休みの日にしたことについて話したり質問したりすることができる。
* 学習目標：休みの日の出来事や予定について友達や周りの人と簡単に話すことができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyokyukyoan6-19/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_beginner_5ST1.pdf',
            'level' => 'A1',
            'user_id' => 4,
            'text_id' => 13,
        ]);
        Post::create([
            'title' => 'できる日本語 初中級1課①',
            'description' => '## 学習内容
* 学習項目：1. いらっしゃいます(います) 2. と申します 3. (理由)ので、 4. いらしゃいます(来ます) / 参ります 5. 可能動詞 6. 〜なら
* 学習目標：アルバイトの問い合わせをしたり、面接での簡単なやりとりをしたりすることができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー、歌詞、FC
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyotyukyukyoan1-5/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_pre-intermediate_1ST1.pdf',
            'level' => 'A2',
            'user_id' => 4,
            'text_id' => 14,
        ]);
        Post::create([
            'title' => 'できる日本語 初中級2課①',
            'description' => '## 学習内容
* 学習項目：1. 形容詞そうです(様態) 2. 辞書形のは形容詞 3. 辞書形(可能)ようになります
* 学習目標：何か買うときに、その物を見てどんな様子かを友達と話したり、お店の人に自分が知りたい情報を聞いたりして、自分の行動を決めることができる。
* 教具・教材：宿題帳、ことばノート、プリント、テスト、フラッシュカード、PC、スピーカー、歌詞、FC
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyotyukyukyoan1-5/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_pre-intermediate_2ST1.pdf',
            'level' => 'A2',
            'user_id' => 4,
            'text_id' => 14,
        ]);
        Post::create([
            'title' => 'できる日本語 初中級3課①',
            'description' => '## 学習内容
* 学習項目：これからの計画
* 学習目標：来日の目的や今後の目標、計画などを話すことができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー、iPad
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyotyukyukyoan1-5/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_pre-intermediate_3ST1.pdf',
            'level' => 'A2',
            'user_id' => 4,
            'text_id' => 14,
        ]);
        Post::create([
            'title' => 'できる日本語 初中級4課①',
            'description' => '## 学習内容
* 学習項目：〜んですが、〜なら、Vたらいいですか、Vるといいです、Nまでに〜
* 学習目標：住んでいる町の施設やお店の情報を聞いたり教えたりすることができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー、iPad
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyotyukyukyoan1-5/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_pre-intermediate_4ST1.pdf',
            'level' => 'A2',
            'user_id' => 4,
            'text_id' => 14,
        ]);
        Post::create([
            'title' => 'できる日本語 初中級5課①',
            'description' => '## 学習内容
* 学習項目：て形しまいました(後悔)、〜かもしれません、た形/名詞の+あとで
* 学習目標：困った状況を説明したり、なくしたものの特徴やなくしたときの状況について説明したりすることができる。
* 教具・教材：プリント、テスト、フラッシュカード、PC、スピーカー、iPad
#### 教案は、下記のサイトから引用
[ぱんずせんせいBLOG](https://sensei-nihongo.com/dekirunihongosyotyukyukyoan1-5/)
    ※特別に教案の使用許可をいただきました、添付する教案の著作権はぱんずせんせい氏に帰属します。',
            'file_name' => 'dekiru_pre-intermediate_5ST1.pdf',
            'level' => 'A2',
            'user_id' => 4,
            'text_id' => 14,
        ]);
        Post::create([
            'title' => 'みんなの日本語初級Ⅰ 第一課の文法項目の導入アイディア',
            'description' => '## 「〜は…です」の導入方法（直接法）
### 1. 教師が自己紹介する。
* 見本として、まず教師が「〜は…です」を使って自己紹介を行う。
### 2. 生徒に自己紹介をさせる。
* 教師の見本を1回見ただけで真似するのは難しいので、それぞれの生徒が自己紹介をする前に、教師が再度お手本を見せる。
* 教師→生徒1→教師→生徒2→教師… の順番で自己紹介をさせていく。
### 3. 自己紹介ゲーム
* 全員で円になり、ボールを使ってレクリエーションを行う。
* ボールを持っている人が自己紹介を行い、終わったら他の生徒にパスする。
### 4. 名前を覚えているかの確認を行う。
* 「〜は…です」の文型がスムーズにいえるようになったら、円を作ったまま、教師は生徒一人一人にボールをパスし、パネル（添付ファイル）を見せながら「誰ですか？」とその生徒の名前を全員に尋ねる（この時敬称を付けて呼ぶように促す）。
* ボールを渡された生徒は、「〜は…です」の文型を使って自己紹介する。これを繰り返すことで、生徒に他のクラスメートの名前を覚えさせる。',
            'file_name' => 'whoishe.png',
            'level' => 'A1',
            'user_id' => 5,
        ]);
        Post::create([
            'title' => 'みんなの日本語初級Ⅰ 第一課の文法項目の導入アイディア',
            'description' => '## 「から〜まで（時間）」の導入方法
* 使用する補助教材
    * 動詞絵カード（勉強する、働く、休むを表す絵）
    * 時計のパネル複数（時間がそれぞれ違うもの、9時から5時まで用意する）
    * 時間割表（模造紙）
### 「から〜まで（時間）」の導入（直接法）
　T(教師) 「皆さん見てください、これはなんですか？（黒板の絵カード「勉強する」を指す。）」
　S(生徒)「勉強します。」
　T「（時計パネルをそれぞれ指して）9時、勉強します」
　T「10時、勉強します。11時、勉強します。」（12時から1時までは抜かす。）
　T「2時、勉強します。3時、勉強します。4時、勉強します。5時、勉強します。」
　T「聞いてください、**9時から5時まで勉強します。**」
　S 復唱、ここで、「わたしは」を入れて再度復唱させる。
　T「先生は？」「（絵カード「働く」を指して）働きます。先生は9時から5時まで働きます。」
　S 復唱
　T「12時から1時まで勉強しますか？いいえ、休みます。」
　T「（絵カード「休む」を指して）12時から1時まで休みます。」
### 上記が終わったら、時間割表を用いて文型を練習する。
　黒板に時間割が書かれた模造紙を貼る。
　T「（時間割表の1時間目を指し示して）1時間目は9時から9時50分です。」
　これを繰り返して文型の定着を図る。
#### ＊注意点
　「昼休みは12時から1時までです。」と教える際には、主語に人がこないことを伝える。
　　例 : T「12時から1時までです。」「先生？いいえ、昼休みです。」',
            'level' => 'A1',
            'user_id' => 5,
        ]);
    }
}
