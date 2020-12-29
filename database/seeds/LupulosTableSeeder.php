<?php

use App\Models\Lupulo;
use Illuminate\Database\Seeder;

class LupulosTableSeeder extends Seeder
{
    public function run()
    {
    	foreach ($this->lupulos() as $lupulo)
	    {
		    Lupulo::create([
			    'variedad' => $lupulo[0],
			    'aa' => ($lupulo[1] + $lupulo[2]) / 2
		    ]);
	    }

	    Lupulo::create([
        	'variedad' => 'Magnum',
	        'aa' => 15
        ]);

        $ca = Lupulo::create([
            'variedad' => 'Cascade',
            'aa' => 6.4
        ]);

        $br = Lupulo::create([
            'variedad' => 'Brewers Gold',
            'aa' => 5.1
        ]);

        $ch = Lupulo::create([
            'variedad' => 'Chinook',
            'aa' => 0
        ]);

        Lupulo::create([
            'variedad' => 'Columbus',
            'aa' => 15
        ]);

        Lupulo::create([
            'variedad' => 'Willamette',
            'aa' => 4.5
        ]);

        Lupulo::create([
            'variedad' => 'Fuggle',
            'aa' => 5.6
        ]);

        $nd = Lupulo::create([
            'variedad' => 'Northdown',
            'aa' => 0
        ]);

        $nb = Lupulo::create([
            'variedad' => 'Northern Brewer',
            'aa' => 0
        ]);

        Lupulo::create([
            'variedad' => 'Styrian Golding',
            'aa' => 5.25
        ]);

        $ga = Lupulo::create([
            'variedad' => 'Galena',
            'aa' => 0
        ]);

        Lupulo::create([
            'variedad' => 'Golding',
            'aa' => 5.6
        ]);

        Lupulo::create([
            'variedad' => 'Nugget',
            'aa' => 14
        ]);

        Lupulo::create([
            'variedad' => 'Hallertauer',
            'aa' => 4.1
        ]);

	    Lupulo::create([
		    'variedad' => 'Liberty',
		    'aa' => 4.5
	    ]);

        Lupulo::create([
            'variedad' => 'Hallertauer Mittelfruh',
            'aa' => 4.2
        ]);

        Lupulo::create([
		    'variedad' => 'Hallertauer Hersbrucker',
//		    'country' => 'Germany',
//		    'aroma_profile' => ['Hay', 'Tobacco', 'Orange'],
//		    'styles' => ['Lager', 'Pilsner', 'Bock', 'Wheat', 'Kolsch', 'Helles'],
		    'aa' => 4,
//		    'alpha_acids' => [
//			    'min' => 1.5,
//			    'max' => 4
//		    ],
//		    'beta_acids' => [
//			    'min' => 2.5,
//			    'max' => 6
//		    ],
//		    'total_oil' => [
//			    'min' => 0.5,
//			    'max' => 1,
//			    'B-Pinene' => [
//				    'min' => 15,
//				    'max' => 30
//			    ],
//			    'Myrcene' => [
//				    'min' => 0.5,
//				    'max' => 1
//			    ],
//			    'Linalool' => [
//				    'min' => 8,
//				    'max' => 13
//			    ],
//			    'Caryophyllene' => [
//				    'min' => 8,
//				    'max' => 13
//			    ],
//			    'Farnesene' => [
//				    'min' => 0,
//				    'max' => 1
//			    ],
//			    'Humulene' => [
//				    'min' => 20,
//				    'max' => 30
//			    ],
//			    'Geraniol' => 0,
//			    'Selinene' => 0,
//			    'Other' => [
//				    'min' => 25,
//				    'max' => 56
//			    ],
//		    ],
	    ]);

	    $br->sustitutos()->save($ca);
        $br->sustitutos()->save($nd);
        $br->sustitutos()->save($nb);
        $br->sustitutos()->save($ga);
        $br->sustitutos()->save($ch);
    }

    protected function lupulos()
    {
    	return [
//    		[Nombre, Alfa Acidos Minimo, maximo]
    	    ['Aramis', 7.9, 8.3, ['Green', 'Herbal', 'Spicy', 'Citrus'], ['English Pale Ale', 'Pale Ale']],
    	    ['Goldings', 4, 4.2, [], ['Trappist', 'Ale', 'Pale Ale', 'Porter']],
            ['Mosaic', 11.5, 13.5, ['Citrus', 'Lemon'], []],
		    ['Perle', 4, 9, ['Mint', 'Tea', 'Pepper'], ['Wheat', 'Lager', 'Kolsch', 'Pilsner']],
		    ['Polaris', 18, 23, ['Mint', 'Pineapple', 'Menthol'], ['Stout', 'IPA', 'Double IPA']],
		    ['Saaz', 3, 4.5, ['Earthy', 'Spicy', 'Pleasant', 'Mild'], ['Lager', 'Pilsner', 'Ale', 'Wheat']]
	    ];
    }
}
