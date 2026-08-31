<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Web Development",
                "description_short" => "Membangun website dan aplikasi web modern dengan teknologi terkini, responsif, dan performance optimal untuk bisnis Anda.",
                "description_long" => "Facilis expedita.",
                "icon" => "initial/rocket.svg",
                "scope" => <<<EOS
        Pembuatan website dan aplikasi yang cepat, modern, dan tampil rapi di semua perangkat (HP atau komputer) untuk kebutuhan bisnis Anda.
        <br><br>
        ✓ Tampilan web interaktif & menarik<br>
        ✓ Sistem server & database yang kuat<br>
        ✓ Pembuatan website utuh dari awal<br>
        ✓ Penghubung web dengan aplikasi lain
        EOS,
                "thumbnail" => "01M11199NNJCVS8RCHJ2EMCK9Z.png",
                "carousel" => [
                    [
                        "image_file" => "01M11199NZPYPWT293FDC285HA.png",
                        "embedded_video_url" => null,
                    ],
                    [
                        "image_file" => null,
                        "embedded_video_url" => "https://youtu.be/vktQrBwkTbY",
                    ],
                ],
                "content" => <<<EOS
        Qui sed non maiores sit. Aperiam asperiores in deleniti magnam. Reprehenderit quo aspernatur aut autem. Nulla est ut eum. Vel dicta sint et maxime voluptatem.

        Vero repellendus nam atque animi accusamus accusantium. Error maxime totam sunt sed rerum sit dolore sequi. Rem ut perspiciatis facilis ex. Et minima sit eligendi magni fugit.

        Sit corporis dicta aperiam mollitia. In molestiae magnam explicabo eum aut labore adipisci.

        Sapiente eum sapiente qui deserunt qui aut. Reprehenderit delectus rerum sint non veritatis sit velit. Minus qui libero totam corporis. Provident eum quod tempore sed eos provident officia cupiditate. Maxime ex sequi molestiae est eum repudiandae incidunt inventore.

        Sit et dicta ab impedit ut. Iusto tempore ullam officiis non itaque iste blanditiis. Qui eligendi dolore sint tenetur dolor quis.

        Velit voluptatem consequuntur necessitatibus qui eos. Nulla est omnis incidunt in. Laudantium soluta vero similique ullam magnam illo. Maxime eligendi et quia voluptate corrupti suscipit officia.

        Laborum a suscipit rerum quidem. Tenetur porro sed repellat. Iure minus consequatur ratione et beatae dolor. Voluptas excepturi nemo esse iste facilis praesentium.

        Temporibus provident eum tempore excepturi cum et qui. Debitis ut quasi ex tempore quis. Veritatis voluptas consequatur illum minima voluptatibus.

        Cum aliquam delectus et occaecati error. Accusamus officiis qui repellat provident sunt voluptatem labore maxime. Sunt incidunt qui odit animi.

        Sed est dolorum ad sit. Incidunt quos et veritatis natus. Quia libero perferendis doloremque itaque ea.
        EOS,
                "tags" => [
                    "dummy",
                    "test",
                ],
                "related_projects" => [
                    14,
                    3,
                    7,
                    3,
                    4,
                ],
                "related_services" => [
                    2,
                    3,
                    4,
                ],
                "related_products" => [
                    14,
                    3,
                    7,
                    3,
                    4,
                ],
                "related_blogs" => [
                    14,
                    3,
                    7,
                    3,
                    4,
                ],
            ],
            [
                "name" => "Technical Consulting",
                "description_short" => "Similique omnis in.",
                "description_long" => "Libero labore.",
                "icon" => "initial/light-bulb.svg",
                "scope" => <<<EOS
        Diskusi dan saran ahli untuk memilih teknologi terbaik serta merancang strategi digital yang tepat agar operasional bisnis Anda lebih efisien.
        <br><br>
        ✓ Pemilihan teknologi paling pas<br>
        ✓ Pengecekan & perbaikan struktur sistem<br>
        ✓ Membuat aplikasi berjalan lebih cepat<br>
        ✓ Penerapan standar kualitas terbaik
        EOS,
                "thumbnail" => "fff.png",
                "carousel" => [
                    [
                        "image_file" => null,
                        "embedded_video_url" => null,
                    ],
                    [
                        "image_file" => null,
                        "embedded_video_url" => "https://youtu.be/vktQrBwkTbY",
                    ],
                ],
                "content" => <<<EOS
        Eveniet id quidem doloremque sint quia. Assumenda ratione temporibus in aperiam sunt voluptatum ea. Laboriosam ut saepe aut delectus. Rerum temporibus quas ut voluptas provident molestias.

        Ea soluta asperiores quis sunt dolor eligendi aut. Iusto consectetur voluptatem voluptate soluta ut.

        Magni in et est asperiores vel porro velit dolorem. Sint dolore necessitatibus alias sint excepturi. Non iste officia laudantium minus. Et excepturi aut vitae earum eligendi.

        Modi omnis tempora et. Eos voluptates totam reprehenderit sit qui voluptas distinctio. A dolorem pariatur ea reprehenderit et.

        Velit repudiandae qui neque aut. Eveniet quam consequatur at illum incidunt laboriosam et vero. A quaerat exercitationem maxime suscipit vel perspiciatis ut. Dolore repellat qui quibusdam aperiam adipisci eaque quia.

        Sunt voluptas et voluptate maxime ipsum veniam praesentium exercitationem. Et laborum sed optio aperiam. Quia esse itaque autem excepturi corrupti.

        Perferendis dolorum totam quaerat veniam omnis alias vel. Quos temporibus doloremque quis rerum fugit dolorem provident. Officia et repellendus et est quisquam doloribus non omnis. Fuga quam eum natus tempore possimus architecto.

        Pariatur assumenda id quas dicta. Neque cum iure ut repudiandae doloribus. Sunt sequi perspiciatis et sequi ut commodi.

        Dolorem aut molestiae est et possimus laboriosam quidem. Quo illum unde consectetur. Sunt et soluta quo blanditiis unde et illo. Rerum voluptates numquam sit non qui qui ipsum tempora.

        Aliquam id et voluptas neque et numquam. Rerum molestias ut molestiae minima aliquid velit. Tempore atque voluptas enim est. Sed qui est tenetur voluptates ut illo quia.
        EOS,
                "tags" => [
                    "test",
                ],
                "related_projects" => [
                    12,
                    15,
                    2,
                    11,
                    19,
                ],
                "related_services" => [
                    1,
                    3,
                    4,
                ],
                "related_products" => [
                    12,
                    15,
                    2,
                    11,
                    19,
                ],
                "related_blogs" => [
                    12,
                    15,
                    2,
                    11,
                    19,
                ],
                "created_at" => "2026-08-13T07:42:16.000000Z",
                "updated_at" => "2026-08-31T08:15:52.000000Z",
                "deleted_at" => null,
            ],
            [
                "name" => "Maintenance & Support",
                "description_short" => "Repellendus iusto.",
                "description_long" => "Tempore quibusdam.",
                "icon" => "initial/magic.svg",
                "scope" => <<<EOS
        Perawatan rutin dan bantuan teknis agar website atau aplikasi Anda selalu aman, lancar, dan bebas dari masalah.
        <br><br>
        ✓ Perbaikan error dan masalah teknis<br>
        ✓ Penambahan fitur baru pada aplikasi<br>
        ✓ Pembaruan sistem keamanan berkala<br>
        ✓ Pemantauan kelancaran aplikasi
        EOS,
                "thumbnail" => "fff.png",
                "carousel" => [
                    [
                        "image_file" => null,
                        "embedded_video_url" => null,
                    ],
                    [
                        "image_file" => null,
                        "embedded_video_url" => "https://youtu.be/vktQrBwkTbY",
                    ],
                ],
                "content" => <<<EOS
        Quia alias voluptas praesentium omnis quasi nisi in. Quasi autem ab quasi officia hic. Quasi porro consequuntur et velit.

        Accusantium aut eos ratione consectetur. Recusandae nobis rerum corrupti sit molestiae et nihil nihil. Possimus voluptatem id veniam eligendi.

        Necessitatibus esse accusamus natus et modi. Voluptates voluptas sed autem explicabo. Est dolores nemo mollitia est voluptates unde.

        In rerum eos aperiam veritatis sapiente reprehenderit velit. Expedita sunt nihil assumenda beatae dolores. Aut est aut voluptatem atque consequatur quod non iure.

        Eligendi et velit harum non voluptas modi nihil. Iusto sapiente ex id id omnis saepe. Nihil facere dolorem temporibus maxime. Necessitatibus earum qui aut accusantium quasi accusantium laudantium.

        Earum quo fugit aperiam cupiditate eum. Ipsum modi labore consequatur ut at. Suscipit veniam incidunt temporibus est nihil sint.

        Id veritatis et et temporibus delectus minima. Animi doloremque dicta ea quae.

        Quidem et eum perspiciatis inventore. Magni excepturi at est sit molestiae aliquam. Perferendis assumenda delectus natus deleniti consequuntur veritatis porro in.

        Ut quam est atque qui et cumque illum. Ex dolores omnis natus ratione enim qui corrupti. Eveniet necessitatibus id unde a eum cupiditate est natus. Sit voluptatem consequatur quae minus.

        Dolores a quia aut quaerat. Placeat facilis sequi dolores sint quod. Impedit ipsa est ut.
        EOS,
                "tags" => [
                    "dummy",
                    "test",
                ],
                "related_projects" => [
                    13,
                    11,
                    9,
                    9,
                    8,
                ],
                "related_services" => [
                    1,
                    2,
                    4,
                ],
                "related_products" => [
                    13,
                    11,
                    9,
                    9,
                    8,
                ],
                "related_blogs" => [
                    13,
                    11,
                    9,
                    9,
                    8,
                ],
            ],
            [
                "name" => "App & Web Modernization",
                "description_short" => "Adipisci voluptatum.",
                "description_long" => "Quod accusamus.",
                "icon" => "initial/wrench.svg",
                "scope" => <<<EOS
        Memperbarui aplikasi lama Anda menjadi lebih canggih, anti-lelet, dan mematuhi aturan rilis terbaru dari Google Play Store maupun Apple App Store.
        <br><br>
        ✓ Rombak ulang agar ringan & modern<br>
        ✓ Kode sistem rapi agar mudah dikelola<br>
        ✓ Penyesuaian standar App & Play Store<br>
        ✓ Perbaikan masalah di aplikasi lama
        EOS,
                "thumbnail" => "fff.png",
                "carousel" => [
                    [
                        "image_file" => null,
                        "embedded_video_url" => null,
                    ],
                    [
                        "image_file" => null,
                        "embedded_video_url" => "https://youtu.be/vktQrBwkTbY",
                    ],
                ],
                "content" => <<<EOS
        Officiis dolorem eum placeat pariatur et. Maiores labore qui et vero. Corporis aut nemo earum sequi nemo quasi maiores. Repudiandae beatae nihil dolores at accusantium ut ut dolorem.

        Cupiditate officia voluptas aut doloribus sunt quis. Vel nihil totam pariatur reprehenderit. Voluptas rem ducimus cumque quasi voluptate magni. Nostrum eveniet temporibus magnam quisquam neque quo.

        Repellendus dolor atque libero quam. Ut sed doloremque vel reprehenderit rerum omnis possimus. Est dolores minus fugit dolorem distinctio omnis.

        Nulla consequuntur consequatur tempore praesentium. Accusantium eos et necessitatibus et in delectus dolorem vitae. Fugit vel esse possimus sit.

        Nulla totam modi ut numquam ducimus qui. Et est dolorem molestias amet. Voluptate error vitae ea a est quo et. Iure id quidem maiores esse.

        Quia et impedit voluptas eius aut. Dolore fugit ut minus.

        Officiis est quisquam sit quo fugiat. Omnis sit cupiditate aliquid delectus possimus autem. Id libero dolorem dolores ut est et.

        Dolor molestiae ad dolore doloribus maiores. Cupiditate assumenda sint voluptatibus qui id. Nobis dolorum reprehenderit qui sequi nemo culpa. Explicabo omnis officiis eaque facilis magni dolorem neque.

        Rerum voluptas doloribus maiores veritatis. Ducimus fugiat velit fugiat libero quaerat. Et cumque facere sed cumque est aperiam.

        Cupiditate animi sequi voluptatem doloremque rem qui. Maxime nemo consequuntur nihil minima. Itaque quae dolorum dolorum qui rem.
        EOS,
                "tags" => [
                    "dummy",
                    "test",
                ],
                "related_projects" => [
                    3,
                    5,
                    12,
                    16,
                    4,
                ],
                "related_services" => [
                    1,
                    2,
                    3,
                ],
                "related_products" => [
                    3,
                    5,
                    12,
                    16,
                    4,
                ],
                "related_blogs" => [
                    3,
                    5,
                    12,
                    16,
                    4,
                ],
            ],
        ];

        foreach ($data as $item) {
            Service::create($item);
        }
    }
}
