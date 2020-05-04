<?php 
    function get_usia($waktu){
        $datet1 = new DateTime($waktu);
        $datet2 = new DateTime(Date("Y-m-d h:i:s"));
        $difference = $datet2->diff($datet1);
        if($interval = $difference->y==0){
            if($interval = $difference->m==0){
                if($interval = $difference->d==0){
                    if($interval = $difference->h==0){
                        if($interval = $difference->i==0){
                            $data = $difference->s.' Detik';
                        }else{
                            $data = $difference->i.' Menit';
                        }
    
                    }else{
                      $data = $difference->h.' Jam';  
                    }
                    
                }else{
                    $data = $difference->d.' Hari';
                }
                
            }else{
                $data = $difference->m.' Bulan';
            }
            
        }else{
            $data = $difference->y.' Tahun';
        }
    
        return $data;
    }

    function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
      }
?>