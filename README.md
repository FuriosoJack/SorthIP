

# License

  El codigo de licencia debe seguirse al pie de la letra, si usted utiliza esta libreria los derechos de autor deben estar incluidos en todas la copias.
  
  Para mas informacion la puede encontra en el archivo LICENSE.txt.

  
# SorthIP
Ordena lista de direcciones ip y subredes | Sort list ip addresses and subnets

## Installation 

```bash
$ php composer require furiosojack/sorthip=^0.0
```

OR 

add to your `composer.json`

```json
{
    "require": {
        "furiosojack/sorthip": "^0.0"
    }
}
```

## Examples

 ```php
$ips = [
          '255.168.0.1',
            '172.6.0.1',
            '172.0.0.1',
            '201.0.0.0'
        ];
$sotIp = new SorthIP($ips);

echo $sotIp->orderAsc();
```

result 
```json
array:4 [▼
  0 => "255.168.0.1"
  1 => "201.0.0.0"
  2 => "172.6.0.1"
  3 => "172.0.0.1"
]
```
