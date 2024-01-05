<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="book-list" style="margin-top:20px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom:20px;">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        <div style="display:grid; grid-template-columns:50px 300px 1fr 1fr 1fr 100px; gap:20px;">
                            <div>
                                ID
                            </div>
                            <div>
                                Kitap
                            </div>
                            <div>
                                Yorum
                            </div>
                            <div>
                                Tarih
                            </div>
                            <div>
                                Onay Durumu
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @foreach($comments as $comment)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom:20px;">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        <div style="display:grid; grid-template-columns:50px 300px 1fr 1fr 1fr 100px; gap:20px;">
                            <div>
                                {{$comment->id}}
                            </div>
                            <div>
                                {{$comment->book->title}}
                            </div>
                            <div>
                                {{$comment->comment_text}}
                            </div>
                            <div>
                                {{$comment->created_at}}
                            </div>
                            <div>
                                {{($comment->is_approved == 1) ? 'Onaylandı' : 'Beklemede'}}
                            </div>
                            <div>
                                @if($comment->is_approved == 0)
                                    <a href="javascript:;" class="approve_comment" comment_id="{{$comment->id}}">Onayla</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        $('.approve_comment').click(function(){
            let comment_id = parseInt($(this).attr('comment_id'));

            const data = {
                "comment_id" : comment_id,
                "_token" : "{{ csrf_token() }}"
            }

            
                $.post('{{ route("comment_approve") }}', data, function(response){
                    if(response == "success"){
                        alert('Yorum onaylanmıştır!');
                        location.reload();
                    }

                    console.log(response)
                })
            
        })
    </script>
</x-app-layout>
