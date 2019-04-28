<?php
    function check_broken_link($url)
    {
        $handle = curl_init($url);
        if($handle === false)
        {
            return false;
        }
        curl_setopt($handle, CURLOPT_HEADER, false);
        curl_setopt($handle, CURLOPT_FAILONERROR, true);
        curl_setopt($handle, CURLOPT_NOBODY, true);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
        $connectable = curl_exec($handle);
        curl_close($handle);
        return $connectable;
    }
    $url = 'https://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx';
    $update_timer = '';
    if(check_broken_link($url) === true)
    {
        $xml = file_get_contents($url);
        $data = simplexml_load_string($xml);
        if($data === false)
        {
            echo '<tr class="danger"><th colspan="5" style="text-align: center">
            <h5>DỮ LIỆU  LỖI !<h5/>
            </th></tr>';
        }
        else
        {
            $update_timer = $data->DateTime;
            $currency = $data->Exrate;
            $i = 1;
            foreach ($currency as $curr)
            {
                $ma = $curr['CurrencyCode'];
                $ten = $curr['CurrencyName'];
                $gia_mua = $curr['Buy'];
                $gia_chuyen_khoan = $curr['Transfer'];
                $gia_ban = $curr['Sell'];
                $class_color = 'success';
                if($i % 2 == 0)
                {
                    $class_color = 'info';
                }
                echo "<tr class='".$class_color."'>";
                    echo "<td style='text-align: center'>".$ma."</td>";
                    echo "<td style='text-align: center'>".$ten."</td>";
                    echo "<td style='text-align: center'>".$gia_mua."</td>";
                    echo "<td style='text-align: center'>".$gia_chuyen_khoan."</td>";
                    echo "<td style='text-align: center'>".$gia_ban."</td>";
                echo "</tr>";
                $i++;
            }
        }
    }
    else
    {
        echo "<tr class='danger'><th colspan='5' style='text-align: center'>
        <h5>KHÔNG THỂ KẾT NỐI VỚI MÁY CHỦ</h5>
        </th></tr>";
    }