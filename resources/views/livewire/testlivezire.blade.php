<div>
    {{-- The Master doesn't talk, he acts. --}}
        @include('livewire.includes.todolist')
        @include('livewire.includes.sserch')
        <div id="todos-list">
            @include('livewire.includes.footer')

            <div class="my-2">
                <!-- Pagination goes here -->
            </div>
        </div>
    </div>
</div>
