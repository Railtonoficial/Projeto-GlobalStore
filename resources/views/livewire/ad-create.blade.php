<main>
    <div class="newAd-page">
        <div class="newAd-title">Novo anúncio</div>
        <div class="newAd-areas">
            <div class="newAd-area-left">
                <div class="area-left-up">
                    <div class="area-left-up-title">Imagens</div>
                    <div class="area-left-up-img">
                        <img src="assets/icons/imageIcon.png" />
                        <div class="area-left-up-img-text">
                            <span onClick="openFileDialog()">Clique aqui</span> para enviar uma imagem
                        </div>
                        @error('photos') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="area-left-bottom">
                    @foreach($photos as $photo)
                        <div class="smallpics">
                            <img src="{{ $photo->temporaryUrl() }}" />
                        </div>
                    @endforeach

                    @for($i = count($photos); $i < 5; $i++)
                        <div class="smallpics">
                            <img src="/assets/icons/imageSmallIcon.png" />
                        </div>
                    @endfor

                </div>
            </div>
            <div class="newAd-area-right">
                <form class="newAd-form" wire:submit="save">
                    <input id="file-upload" type="file" style="visibility: hidden;" wire:model="photos" multiple accept="image/jpeg, image/png" />
                    <div class="title-area">
                        <div class="title-label">Título do anúncio</div>
                        @error('title') <span class="form-error">{{ $message }}</span> @enderror
                        <input wire:model="title" type="text" placeholder="Digite o título do anúncio" />
                    </div>
                    <div class="value-area">
                        <div class="value-label">
                            <div class="value-area-text">Valor</div>
                            @error('price') <span class="form-error">{{ $message }}</span> @enderror
                            <input wire:model="price" type="text" placeholder="Digite o valor" />
                        </div>
                        <div class="negotiable-area">
                            <div class="negotiable-label">Negociável?</div>
                            @error('negotiable') <span class="form-error">{{ $message }}</span> @enderror
                            <select wire:model="negotiable">
                                <option value="0" selected>Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                    </div>
                    <div class="newAd-categories-area">
                        <div class="newAd-categories-label">Categorias</div>
                        @error('category_id') <span class="form-error">{{ $message }}</span> @enderror
                        <select wire:model="category_id" class="newAd-categories" required>
                            <option selected>
                                Selecione uma categoria
                            </option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="description-area">
                        <div class="description-label">Descrição</div>
                        @error('description') <span class="form-error">{{ $message }}</span> @enderror
                        <textarea
                            wire:model="description"
                            class="description-text"
                            placeholder="Digite a descrição do anúncio"></textarea>
                    </div>
                    <button class="newAd-button">Criar anúncio</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openFileDialog() {
            document.getElementById('file-upload').click();
        }
    </script>
</main>
