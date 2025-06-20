<?php

namespace Database\Seeders;

use App\Models\Lot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LotSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insertGetId([
            'first_name' => 'Laurente',
            'last_name' => 'Morhain',
            'email' => 'Laurente@gmail.com',
            'password_hash' => bcrypt('password1'),
            'rating' => 4.5,
            'birth_date' => '1973-05-15',
            'city' => 'Paris',
            'bio' => 'Hello. My name is Laurente Morhain, I am 52 years old, and I live and work in Paris. For over thirty years, my life has been closely intertwined with archaeology, history, and the discovery of artifacts that carry the breath of ancient civilizations. After studying antiquity and Eastern Mediterranean history at the Sorbonne, I spent many years in field expeditions. I worked in Egypt, Turkey, Syria, and the Balkans — excavating burial sites, restoring mosaics, photographing cuneiform tablets. Those years became a school of reverence for me — reverence for time, for memory, and for the people who left these traces behind. Today, I’m offering part of my collection for sale — for various reasons: to give these items a "second life," to allow them to become part of someone else\'s archaeological journey, and sometimes simply to make space for new discoveries. I believe artifacts shouldn\'t lie hidden in drawers; they should be seen, studied, and interpreted.',
            'avatar_url' => null,
            'is_baned' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insertGetId([
            'first_name' => 'Анастасия',
            'last_name' => 'Шмидт',
            'email' => 'Anastasia@gmail.com',
            'password_hash' => bcrypt('password2'),
            'rating' => 4.9,
            'birth_date' => '2000-12-31',
            'city' => 'Пермь',
            'bio' => 'Археолог по образованию и жадная до денег по призванию.После университета я работала в официальных экспедициях — копала, каталогизировала, отчитывалась. Но со временем поняла, что настоящие открытия редко лежат на поверхности и почти никогда не попадают в музеи. Часть находок оседает в хранилищах, часть теряется в бюрократии.Сейчас я работаю независимо. Порой консультирую коллекционеров, иногда передаю предметы в частные собрания. Всё, что я делаю, — с уважением к прошлому. Не торгую предметами религиозной тематики, в основном выставляю оружие или украшения ',
            'avatar_url' => null,
            'is_baned' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insertGetId([
            'first_name' => 'Евгений',
            'last_name' => 'Васильев',
            'email' => 'Evgeny@gmail.com',
            'password_hash' => bcrypt('password3'),
            'rating' => 4.3,
            'birth_date' => '1990-01-01',
            'city' => 'Москва',
            'bio' => 'Я профессиональный археолог и продавец антиквариата. Я люблю историю и все, что связано с ней. Мои лоты представляют собой различные предметы, найденные во время моих экспедиций. Я стараюсь создать впечатление, что каждый из моих лотов был найден и изучен лично мной.',
            'avatar_url' => null,
            'is_baned' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Создаём продавцов
        DB::table('sellers')->insertGetId([
            'user_id' => 1,
            'citizenship' => 'France',
            'gender' => 'male',
            'passport_number' => '1234 123412',
            'passport_issued_by' => 'DG Paris',
            'passport_photo_url' => '/storage/passport/pass-euro.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sellers')->insertGetId([
            'user_id' => 2,
            'citizenship' => 'Россия',
            'gender' => 'female',
            'passport_number' => '3333 444444',
            'passport_issued_by' => 'ОВД г. СПб',
            'passport_photo_url' => '/storage/passport/pass-euro.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Создаём качества лотов
        DB::table('lot_qualities')->insertGetId([
            'quality_code' => 'Идеальное',
            'title' => 'Идеальное состояние',
            'descr' => 'Нет видимых следов износа или манипуляций или они минимальны. Могут присутствовать следы, возникшие на заготовке при изготовлении или чеканке. Отсутствуют следы износа и любые механические повреждения, минимальное влияние времени. Самая наивысшая степень сохранности',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lot_qualities')->insertGetId([
            'quality_code' => 'Отличное',
            'title' => 'Отличное состояние',
            'descr' => '80-90% оригинальных деталей не имеют дефектов. Возможны заметные царапины и небольшие повреждения, вмятины, слабые следы ударов, мытья, чистки, изменение в окраске, влияние времени заметно, но не мешает использованию. Могут остуствовать небольшие фрагменты и быть заметны следы разложения или ржавчины',
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        // Создаём лоты
        DB::table('lots')->insert([
            [
                'seller_id' => 1,
                'title' => 'Фламберг XV века (1410-1420 гг.)',
                'descr' => 'Фламберг — это редкий тип меча с характерным волнистым (пламенеющим) лезвием, используемый преимущественно в Европе в позднем Средневековье. Представленный экземпляр датируется периодом 1410–1420 гг., предположительно изготовлен в Священной Римской империи или северной Франции — регионах, известных своими оружейными мастерскими и кузнечным искусством. Двулезвийный, из кованой высокоуглеродистой стали, длиной около 120 см. Волнообразная форма лезвия не только служила эстетической цели, но и имела практическую функцию — при нанесении удара увеличивалась площадь сечения раны, а также затруднялось парирование удара противником. Такие клинки часто использовались в ближнем бою для разрушения лат и плотной кольчуги. Обмотана кожей поверх деревянной основы, слегка утолщена к навершию. Длина позволяет держать меч как одной рукой, так и обеими, что делает фламберг частично полуторным по типу.Данный фламберг сохранился в хорошем состоянии для своего возраста: заточка утеряна, но контуры волнистого клинка отчётливы, металл стабилизирован от коррозии, рукоять реставрирована с сохранением оригинального материала. Такие экземпляры представляют большую коллекционную и музейную ценность и являются редкими находками даже среди археологических раскопок и частных собраний',
                'quality_id' => 1,
                'starting_price' => 15000,
                'auction_start' => now(),
                'auction_end' => now()->addDays(20),
                'lot_status' => 'active',
                'winner_id' => null,

            ],
        ]);



        DB::table('photos_lots')->insert([
            'lot_id' => 1,
            'photo_url' => '/images/lots/1_1.jpg',
        ]);

                DB::table('photos_lots')->insert([
            'lot_id' => 1,
            'photo_url' => '/images/lots/1_2.jpg',
        ]);

















        // Lot::create([
        //     'title' => 'Фламберг XV века (1410-1420 гг.)',
        //     'starting_price' => 15000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(20),
        //     'image_url' => '/storage/lots/flammard.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Латная перчатка "Песочные часы"',
        //     'starting_price' => 25000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(5),
        //     'image_url' => '/storage/lots/foot.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Меч',
        //     'starting_price' => 930000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(19),
        //     'image_url' => '/storage/lots/hand.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Наголенники латные двустворчатые',
        //     'starting_price' => 15000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(1),
        //     'image_url' => '/storage/lots/foot.jpg',
        // ]);



        // Lot::create([
        //     'title' => 'Фламмард фывфывфы фыв фыв мфва фццц афаыфыв фыв',
        //     'starting_price' => 15000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(17),
        //     'image_url' => '/storage/lots/flammard.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Корона короля Иоанна (1328-1364 гг.)',
        //     'starting_price' => 250999,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(14),
        //     'image_url' => '/storage/lots/crown.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Меч flammen, Германия (1490-1495 гг.)',
        //     'starting_price' => 930000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(11),
        //     'image_url' => '/storage/lots/flammard-2.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Манускрипт времён Карла Великого',
        //     'starting_price' => 155899,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(17),
        //     'image_url' => '/storage/lots/book.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Часослов Ивана Шелли (1547 г.)',
        //     'starting_price' => 18000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(22),
        //     'image_url' => '/storage/lots/Book_of_Hours.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Медные браслеты кара-бомовской традиции',
        //     'starting_price' => 2000,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(25),
        //     'image_url' => '/storage/lots/braslet.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Брошь ахейского княжества (1419 г.)',
        //     'starting_price' => 9999,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(16),
        //     'image_url' => '/storage/lots/brosh.jpg',
        // ]);

        // Lot::create([
        //     'title' => 'Шлем, Швеция 11в.',
        //     'starting_price' => 5500,
        //     'auction_start' => now(),
        //     'auction_end' => now()->addDays(14),
        //     'image_url' => '/storage/lots/helmet.jpg',
        // ]);
    }
}
