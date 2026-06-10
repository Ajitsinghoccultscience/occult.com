@php
    $trainerImg = 'image/graphology assests/pawan sir.webp';
@endphp

{{-- ═══════════════════════════════════
     MEET THE TRAINER
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">
    <div class="max-w-[1340px] mx-auto section-px py-12 md:py-16">
        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">

            {{-- Text --}}
            <div class="flex-1 order-2 md:order-1">
                <p class="text-lg md:text-xl font-bold text-white mb-1">
                    <span style="color:#ff9700;">Trainer :</span> Pawan Kumar ( Graphology Expert )
                </p>
                <p class="text-sm md:text-base font-bold text-white mb-5">
                    (Faculty of All India Institute of Occult Science)
                </p>

                <div class="space-y-3 text-sm md:text-[15px] text-white/75 leading-relaxed">
                    <p>
                        Pawan Kumar is one of the recognized Graphology teachers known for his teaching
                        and training students in Graphology.
                    </p>
                    <p>
                        He belongs to Kota, holds a BSc in Mathematics and a Master's in Psychology.
                        He has earned a Diploma and a Master's in Graphology, shaping his expertise in
                        handwriting analysis.
                    </p>
                    <p>
                        Known for his adaptability, trustworthiness, and adventurous spirit, he now
                        teaches Graphology at the All India Institute of Occult Science.
                    </p>
                </div>
            </div>

            {{-- Image --}}
            <div class="order-1 md:order-2 shrink-0">
                <div class="w-44 h-44 md:w-60 md:h-60 rounded-full overflow-hidden ring-4 ring-[#ff9700] shadow-lg">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $trainerImg)))) }}"
                         alt="Pawan Kumar - Graphology Trainer"
                         class="w-full h-full object-cover"
                         loading="lazy">
                </div>
            </div>

        </div>
    </div>
</section>
