<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'Oppo mobile',
                'model'=>null,
                'price'=>'350',
                'description'=>'A smartphone with 8gb ram and much more feature',
                'stock'=>'100',
                'category_id'=>'1',
                'seller_id'=>'3',
                'gallery'=>'/images/oppo-phone.webp'
            ],
            [
                'name'=>'Panasonic Tv',
                'model'=>null,
                'price'=>'499.99',
                'description'=>'A smart tv with much more feature',
                'stock'=>'10',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/images/panasonic-tv.webp'
            ],
            [
                'name'=>'Sony Tv',
                'model'=>null,
                'price'=>'850',
                'description'=>'A tv with much more feature',
                'stock'=>'5',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/images/sony-tv.webp'
            ],
            [
                'name'=>'Longboard',
                'model'=>null,
                'price'=>'249.99',
                'description'=>'Un longboard molto bello.',
                'stock'=>'3',
                'category_id'=>'3',
                'seller_id'=>'2',
                'gallery'=>'/images/longboard.webp'
            ],
            [
                'name'=>'Cinelli King Zydeco',
                'model'=>null,
                'price'=>'2999.99',
                'description'=>'Questo telaio unico permette performance estreme sulle superfici più diverse come asfalto, strade bianche e terreni impervi, grazie alla possibilità di montare ruote da 700c e 650b con copertoni fino a 2,1”. La costruzione in carbonio monoscocca e la sua geometria da corsa rendono questo telaio leggero e veloce. Perfettamente a suo agio sia in gare gravel su lunghe distanze che in esplorazioni con bike packing.',
                'stock'=>'2',
                'category_id'=>'3',
                'seller_id'=>'4',
                'gallery'=>'/images/bici.webp'
            ],
            [
                'name'=>'Trenta e Lode',
                'model'=>null,
                'price'=>'55000',
                'description'=>'Il voto che si merita questo bellissimo progetto.',
                'stock'=>'999',
                'category_id'=>'3',
                'seller_id'=>'4',
                'gallery'=>'/images/trenta.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to the Sun',
                'price'=>'250',
                'description'=>'Questa stella del firmamento di colore giallo acceso come il sole, presenta un raffinato quadrante spazzolato e un cinturino in VELCRO© bianco. La lancetta dei secondi del cronografo, le lancette dei quadranti secondari e la scala tachimetrica sono di colore arancione. Lo sfondo dei quadranti secondari e della lunetta sono invece bianchi. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_sun.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to the Moon',
                'price'=>'250',
                'description'=>'Fai (quasi) sul serio con questo orologio grigio acciaio, dotato di un cinturino in VELCRO© nero. Tutte le lancette e la scala tachimetrica sono di colore bianco, proprio come quelle del Moonwatch originale. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_moon.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Mercury',
                'price'=>'250',
                'description'=>'Con il suo colore grigio profondo intenso e il cinturino grigio metallico VELCRO©, questo orologio è sinonimo di affari. La lancetta dei secondi del cronografo, le lancette dei quadranti secondari e la scala tachimetrica sono di colore bianco. Lo sfondo dei quadranti secondari e della lunetta sono invece neri. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_mercury.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Venus',
                'price'=>'250',
                'description'=>'Su questo orologio audace, il cinturino in VELCRO© bianco controbilancia in modo perfetto il rosa pastello polvere. I quadranti secondari ovali, impreziositi da dettagli in stile diamante sui bordi, conferiscono un tocco di femminile eleganza. La lancetta di ore, minuti e secondi del cronografo e le lancette dei quadranti secondari sono a loro volta rosa. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_venus.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission on Earth',
                'price'=>'250',
                'description'=>'Gli astronauti ecologisti ameranno questo orologio verde natura con cinturino in VELCRO© di colore blu marino. La lancetta dei secondi del cronografo e le lancette dei contatori sono di colore marrone. I quadranti secondari sono di colore bianco. Dello stesso colore è anche la scala tachimetrica sullo sfondo della lunetta blu. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_earth.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Mars',
                'price'=>'250',
                'description'=>'Per rendere onore a Marte, tonalità rosso ardente entrano in contrasto con il quadrante bianco brillante e il cinturino in VELCRO©. La lancetta dei secondi del cronografo è di colore rosso, mentre i quadranti secondari di ore e minuti presentano lancette uniche di colore rosso, con un\'allegra forma di navicella spaziale. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_mars.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Jupiter',
                'price'=>'250',
                'description'=>'Per quelli che amano mantenersi sul classico, questo orologio presenta eleganti tonalità beige che controbilanciano in modo perfetto il cinturino in VELCRO©. La lancetta dei secondi del cronografo e le lancette dei quadranti secondari sono di colore arancione. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_jupiter.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Saturn',
                'price'=>'250',
                'description'=>'Su questo modello, tonalità color sabbia e beige entrano dolcemente in contrasto con il quadrante marrone e il cinturino in VELCRO©. La lancetta dei secondi del cronografo, le lancette dei quadranti secondari e lo sfondo della scala tachimetrica sono a loro volta di colore marrone. Il quadrante secondario dei secondi rappresenta gli anelli di Saturno. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_saturn.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Uranus',
                'price'=>'250',
                'description'=>'L\'etereo blu pastello incontra un cinturino in VELCRO© di colore bianco acceso su questo esemplare della collezione Mission. La lancetta del cronografo, le lancette dei contatori e lo sfondo della scala tachimetrica sono di colore bianco. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_uranus.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Neptune',
                'price'=>'250',
                'description'=>'Un\'intensa combinazione di tonalità blu marino profondo e il cinturino in VELCRO© nero rendono questo orologio perfetto per gli amanti dei colori scuri. Per creare contrasto, la lancetta dei secondi del cronografo, le lancette dei quadranti secondari e la scala tachimetrica sono di colore bianco. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_neptune.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Pluto',
                'price'=>'250',
                'description'=>'Su questo orologio, tonalità di grigio chiaro alla moda entrano in contrasto con il cinturino in VELCRO© di colore grigio scuro. La lancetta dei secondi del cronografo e le lancette dei quadranti secondari sono di colore nero, mentre lo sfondo dei quadranti e della lunetta presentano due tonalità di bordeaux. Tutti i quadranti sono contraddistinti dal marchio OMEGA X SWATCH, nonché dall\'iconico logo Speedmaster e dal nuovo logo MoonSwatch. La struttura del vetro, la "S nascosta" integrata al centro, il motivo circolare raffinato ed elegante sull\'anello esterno del quadrante e i quadranti secondari, la struttura sottile e armoniosa degli aggetti, l\'iconico dettaglio del "punto sopra al 90" sulla lunetta con scala tachimetrica e, naturalmente, il tocco unico di Bioceramic sono caratteristiche comuni di tutti i modelli e dimostrano lo straordinario amore per i dettagli. Tutte le lancette di ore, minuti e secondi del cronografo e gli indicatori dell\'ora presentano il trattamento Superluminova, per una perfetta fosforescenza al buio.',
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_pluto.webp'
            ],
        ]);

        $imgs_folder = 'database/seeders/imgs/';
        $imgs = ['lg-fridge.webp', 'oppo-phone.webp', 'panasonic-tv.webp', 'sony-tv.webp', 'longboard.webp', 'trenta.webp', 'bici.webp', 'swatch_earth.webp', 'swatch_jupiter.webp', 'swatch_mars.webp', 'swatch_mercury.webp', 'swatch_moon.webp', 'swatch_neptune.webp', 'swatch_pluto.webp', 'swatch_saturn.webp', 'swatch_sun.webp', 'swatch_uranus.webp', 'swatch_venus.webp'];

        foreach ($imgs as $img) {
            File::copy($imgs_folder . $img, Storage::path("images/$img"));
        }
    }
}
