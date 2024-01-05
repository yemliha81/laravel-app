<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="book-list" style="margin-top:20px;">
        @foreach($books as $book)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom:20px;">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 grid-4" style="display:grid; grid-template-columns:150px auto; gap:20px;">
                        
                        <div class="book" style="background:#f3f3f3; border-radius:10px; overflow:hidden;">
                            <div>
                                <img src="https://placehold.it/200x200/2760dc/FFFFFF" width="100%">
                            </div>
                        </div>
                        <div class="book-info" style="display:flex; flex-direction:column; gap:5px; font-size:13px; padding:8px;">
                            <div style="font-weight:bold; font-size:18px;">{{ $book->title }}</div> 
                            <div><b>Yazar:</b>{{ $book->author }}</div> 
                            <div><b>Türü:</b>{{ $book->category_title }}</div> 
                            <div><b>Önyazı:</b>{{ $book->coverletter }}</div> 
                            <div class="">
                                <input type="checkbox" class="is_read" book_id="{{$book->id}}"/> Önyazıyı okudum.
                            </div>
                            <div class="comment_box_{{$book->id}}" style="display:none;">
                                <div>
                                    <textarea class="comment_text_{{$book->id}}" id="" rows="3" style="width:100%;" placeholder="Yorum ve görüşlerinizi bildirebilirsiniz."></textarea>
                                    <div>
                                        <button class="save_comment" book_id="{{$book->id}}" style="background:#dddddd; padding:5px 10px;">KAYDET</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        $('.is_read').change(function(){
            let book_id = parseInt($(this).attr('book_id'));

            const data = {
                "book_id" : book_id,
                "_token" : "{{ csrf_token() }}"
            }

            if($(this).is(':checked')){
                $.post('{{ route("book_is_read") }}', data, function(response){
                    if(response == "success"){
                        $('.comment_box_'+book_id).fadeIn();
                    }
                })
            }
        })

        $('.save_comment').click(function(){
            let book_id = parseInt($(this).attr('book_id'));

            const data = {
                "book_id" : book_id,
                "comment_text" : $('.comment_text_'+book_id).val(),
                "_token" : "{{ csrf_token() }}"
            }

            
                $.post('{{ route("comment_save") }}', data, function(response){
                    if(response == "success"){
                        alert('Yorumunuz onaylanmak üzere kaydedilmiştir!');
                    }else if(response == "comment_exists"){
                        alert("Bu kitaba daha önce yorum yaptınız!")
                    }
                })
            
        })
    </script>
</x-app-layout>
