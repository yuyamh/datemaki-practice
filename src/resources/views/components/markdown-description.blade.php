<div class="p-2 md:p-4">
    <h1 class="pl-2 my-2 text-xl font-bold border-l-8 border-orange-400">マークダウンとは？</h1>
    <div class="text-sm md:text-base">
        <p class="px-4">記号を入力するだけで、誰でも簡単に文章を修飾できる書き方です。特定の記号を使用することで、太字や段落、リスト、リンク付きテキストなどを文章に簡単に盛り込むことができます。</p>
        <p class="my-6">下記は、マークダウンでよく利用される記号の一例です。<p>
    </div>

    <table class="w-full text-sm break-words border border-collapse table-fixed md:text-base md:text-left markdown-table">
        <thead>
            <tr>
                <th class="w-1/5">項目</th>
                <th class="w-2/5">書き方</th>
                <th class="w-2/5">表示</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>見出し</td>
                <td>
                    # 見出し<br>
                    ## 見出し<br>
                    ### 見出し<br>
                    #### 見出し<br>
                    ##### 見出し<br>
                </td>
                <td class="markdown-body">
                {!! Str::markdown('# 見出し
## 見出し
### 見出し
#### 見出し
##### 見出し') !!}
                </td>
            </tr>
            <tr>
                <td>リスト</td>
                <td>
                    - テキスト<br>
                    - テキスト<br>
                    - テキスト<br>
                </td>
                    <td class="markdown-body">
                        {!! Str::markdown('- テキスト
- テキスト
- テキスト') !!}
                    </td>
            </tr>
            <tr>
                <td>引用</td>
                <td>
                    下記が引用です。<br>
                    >テキスト<br>
                </td>
                <td class="markdown-body">
                    {!! Str::markdown('下記が引用です。
>テキスト
') !!}
                </td>
            </tr>
            <tr>
                <td>太字</td>
                <td>
                    **テキスト**<br>
                    __テキスト__
                </td>
                <td class="markdown-body">
                    {!! Str::markdown('**テキスト**') !!}
                </td>
            </tr>
            <tr>
                <td>斜体</td>
                <td>
                    *テキスト*<br>
                    _テキスト_
                </td>
                <td class="markdown-body">
                    {!! Str::markdown('*テキスト*') !!}
                </td>
            </tr>
            <tr>
                <td>取り消し線</td>
                <td>~~テキスト~~</td>
                <td class="markdown-body">
                    {!! Str::markdown('~~テキスト~~') !!}
                </td>
            </tr>
            <tr>
                <td>水平線</td>
                <td>
                    ***<br>
                    ___<br>
                    ---<br>
                </td>
                <td class="markdown-body">
                    {!! Str::markdown('***
___
---') !!}
                </td>
            </tr>
            <tr>
                <td>リンク</td>
                <td>
                    [表示する文字](URL)<br>
                    例:<br>
                    [Google](https://google.com)
                </td>
                <td class="markdown-body">
                    {!! Str::markdown('[Google](https://google.com)') !!}
                </td>
            </tr>
            <tr>
                <td>表</td>
                <td>
                    |名前|学年|部活|<br>
                    |---|---|---|<br>
                    |健|2年|空手|<br>
                    |修宏|3年|サッカー|<br>
                    |きみ子|1年|ボランティア|<br>
                    <br>
                    |---|---|---|←ヘッダと区切りを付けるための線
                </td>
                <td class="markdown-body">
                    {!! Str::markdown('|名前|学年|部活|
|---|---|---|
|健|2|空手|
|修宏|3|サッカー|
|きみ子|1|ボランティア|') !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>
