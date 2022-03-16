<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Geolocation\State;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['code'=>'5','name'=>'Antioquia'],
            ['code'=> '68','name'=>'Santander'],
            ['code'=> '70','name'=>'Sucre'],
            ['code'=> '85','name'=>'Casanare'],
            ['code'=> '54','name'=>'Norte de Santander'],
            ['code'=> '25','name'=>'Cundinamarca'],
            ['code'=> '97','name'=>'Vaupés'],
            ['code'=> '23','name'=>'Córdoba'],
            ['code'=> '86','name'=>'Putumayo'],
            ['code'=> '52','name'=>'Nariño'],
            ['code'=> '8','name'=>'Atlántico'],
            ['code'=> '13','name'=>'Bolívar'],
            ['code'=> '76','name'=>'Valle del Cauca'],
            ['code'=> '73','name'=>'Tolima'],
            ['code'=> '18','name'=>'Caquetá'],
            ['code'=> '91','name'=>'Amazonas'],
            ['code'=>'15','name'=>'Boyacá'],
            ['code'=> '19','name'=>'Cauca'],
            ['code'=> '27','name'=>'Chocó'],
            ['code'=>'17','name'=>'Caldas'],
            ['code'=> '47','name'=>'Magdalena'],
            ['code'=> '20','name'=>'Cesar'],
            ['code'=> '63','name'=>'Quindío'],
            ['code'=> '50','name'=>'Meta'],
            ['code'=>'41','name'=>'Huila'],
            ['code'=> '44','name'=>'La Guajira'],
            ['code'=> '66','name'=>'Risaralda'],
            ['code'=>'81','name'=>'Arauca'],
            ['code'=>'94','name'=>'Guainía'],
            ['code'=>'99','name'=>'Vichada'],
            ['code'=>'95','name'=>'Guaviare'],
            ['code'=> '88','name'=>'Archipiélago de San Andrés,Providencia y Santa Catalina'],
            ['code'=>'11','name'=>'Bogotá D.C.']
  
          ];
  
          foreach( $states as $state){
              $state_new = new State();
              $state_new->code =$state['code'];
              $state_new->name =strtoupper($this->normalize($state['name']));
              $state_new->save();
  
          }
    }

    /**
     * @param mixed $string
     * 
     * @return [type]
     */
    public function normalize ($string) {
		$table = array(
			'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
			'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
			'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
			'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
			'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
			'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
			'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
			'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
		);
	   
		return strtr($string, $table);
	}
}
