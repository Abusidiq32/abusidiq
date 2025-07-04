            <!-- ### works -->
            <section id="works" class="s-works target-section">
                <div class="row works-portfolio">
                    <div class="column lg-12" data-animate-block>
                        <h2 class="text-pretitle h-text" data-animate-el>
                            {{ $portfolioSettings->title }}
                        </h2>
                        <p class="h1" data-animate-el>
                            {{ $portfolioSettings->sub_title }}
                        </p>

                        <ul class="folio-list row block-lg-one-half block-stack-on-1000">
                            @foreach ($portfolioItems as $items)
                                @php
                                    $modalId = 'modal-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                                @endphp
                                <li class="folio-list__item column" data-animate-el>
                                    <a class="folio-list__item-link" href="#{{ $modalId }}">
                                        <div class="folio-list__item-pic">
                                            <img src="{{ asset($items->image) }}"
                                                srcset="{{ asset($items->image) }} 1x, {{ asset($items->image) }} 2x"
                                                alt="">
                                        </div>

                                        <div class="folio-list__item-text">
                                            <div class="folio-list__item-cat">
                                                {{ $items->category->name }}
                                            </div>
                                            <div class="folio-list__item-title">
                                                {{ $items->title }}
                                            </div>
                                        </div>
                                    </a>
                                    <a class="folio-list__proj-link" href="#" title="project link">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.14645 3.14645C8.34171 2.95118 8.65829 2.95118 8.85355 3.14645L12.8536 7.14645C13.0488 7.34171 13.0488 7.65829 12.8536 7.85355L8.85355 11.8536C8.65829 12.0488 8.34171 12.0488 8.14645 11.8536C7.95118 11.6583 7.95118 11.3417 8.14645 11.1464L11.2929 8H2.5C2.22386 8 2 7.77614 2 7.5C2 7.22386 2.22386 7 2.5 7H11.2929L8.14645 3.85355C7.95118 3.65829 7.95118 3.34171 8.14645 3.14645Z"
                                                fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li> 
                            @endforeach
                        </ul>
                    </div>


                    <!-- Modal Templates Popup -->
                    @foreach ($portfolioItems as $items)
                        @php
                            $modalId = 'modal-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                        @endphp
                        <div id="{{ $modalId }}" hidden>
                            <div class="modal-popup">
                                <img src="{{ asset($items->image) }}" alt="">

                                <div class="modal-popup__desc">
                                    <h5>{{ $items->title }}</h5>
                                    <p>{!! Str::limit(strip_tags($items->description, 200)) !!}</p>
                                    <ul class="modal-popup__cat">
                                        <li>Branding</li>
                                        <li>Product Design</li>
                                    </ul>
                                </div>

                                <a href="{{ route('portfolio.details', $items->id) }}"
                                    class="modal-popup__details">Project link</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
