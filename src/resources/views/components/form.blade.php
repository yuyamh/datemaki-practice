@csrf
<div class="form-group">
    <label for="title" class="block text-lg">
        <span>タイトル</span>
        <span class="text-sm text-red-500">&ensp;※&nbsp;必須</span>
    </label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="例：クラスメートに自己紹介しよう" class="form-input">
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>
<div class="form-group">
    <p class="block text-lg">
        <span>レベル（CEFR基準）</span>
        <span class="text-sm text-red-500">&ensp;※&nbsp;必須</span>
    </p>
    <div class="grid w-full grid-cols-6 p-2 space-x-2 bg-gray-200 shadow-sm rounded-xl">
        {{-- A1をselectedに設定 --}}
        <div>
            <input type="radio" id="level-A1" name="level" class="hidden peer" value="A1"{{ old('level', $post->level ?? 'A1') == 'A1' ? " checked" : "" }}>
            <label for="level-A1" class="radio-label">A1</label>
        </div>
        <div>
            <input type="radio" id="level-A2" name="level" class="hidden peer" value="A2"{{ old('level', $post->level ?? 'A1') == 'A2' ? " checked" : "" }}>
            <label for="level-A2" class="radio-label">A2</label>
        </div>
        <div>
            <input type="radio" id="level-B1" name="level" class="hidden peer" value="B1"{{ old('level', $post->level ?? 'A1') == 'B1' ? " checked" : "" }}>
            <label for="level-B1" class="radio-label">B1</label>
        </div>
        <div>
            <input type="radio" id="level-B2" name="level" class="hidden peer" value="B2"{{ old('level', $post->level ?? 'A1') == 'B2' ? " checked" : "" }}>
            <label for="level-B2" class="radio-label">B2</label>
        </div>
        <div>
            <input type="radio" id="level-C1" name="level" class="hidden peer" value="C1"{{ old('level', $post->level ?? 'A1') == 'C1' ? " checked" : "" }}>
            <label for="level-C1" class="radio-label">C1</label>
        </div>
        <div>
            <input type="radio" id="level-C2" name="level" class="hidden peer" value="C2"{{ old('level', $post->level ?? 'A1') == 'C2' ? " checked" : "" }}>
            <label for="level-C2" class="radio-label">C2</label>
        </div>
    </div>
    <x-input-error :messages="$errors->get('level')" class="mt-2" />
</div>
<div class="form-group">
    <p class="block text-lg">使用テキスト</p>
    <select name="text_id" class="form-input">
        <option value="">なし</option>
        @foreach ($texts as $text)
        <option value="{{ $text->id }}"{{ old('text_id', $post->text_id) == $text->id ? " selected" : "" }}>
            {{ $text->text_name }}
        </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('text_id')" class="mt-2" />
</div>
<div class="form-group">
    <label for="description" class="block text-lg">
        <span>概要</span>
        <span class="text-sm text-red-500">&ensp;※&nbsp;必須、マークダウン記法可</span>
        <button
        class="ml-1 hover:scale-90 active:scale-80"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'markdown-description')"
        >
        <i class="fa-regular fa-circle-question" style="color: #e79608;"></i>
        </button>
        <x-modal name="markdown-description">
            <x-markdown-description />
        </x-modal>
    </label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="授業内容、教案の補足説明などを記入する。" class="form-input">{{ old('description', $post->description) }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>
<div class="form-group">
    <label for="file" class="flex flex-col mb-3 text-lg md:flex-row">
        <span>添付ファイル</span>
        <span class="p-1 text-sm bg-orange-200 rounded-md md:ml-3 md:text-base">
            形式&nbsp;:&nbsp;pdf,&nbsp;docx,&nbsp;zip,&nbsp;xlsx,&nbsp;jpeg,&nbsp;jpg,&nbsp;png
        </span>
    </label>
    @if (isset($post->file_name))
        <div class="flex my-2 ml-2 text-sm">
            <p class="mr-4">現在のファイル&nbsp;:&nbsp;{{ $post->file_name}}</p>
            <p><a href="{{ $post->file_url }}" class="underline hover:text-gray-600">表示</a></p>
        </div>
    @endif
    <input type="file" name="file_name" id="file" class="w-full my-1">
    <x-input-error :messages="$errors->get('file_name')" class="mt-2" />
</div>
