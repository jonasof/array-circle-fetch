## Array Circle Fetch

Fetch elements from array in a circle pattern.

Pass the following table:

|    |    |    |    |    |
|----|----|----|----|----|
| 1  | 2  | 3  | 4  | 5  |
| 6  | 7  | 8  | 9  | 10 |
| 11 | 12 | 13 | 14 | 15 |
| 16 | 17 | 18 | 19 | 20 |
| 21 | 22 | 23 | 24 | 25 |

Its like the following array:

```php
$count = 1;

$array = [];
for($y = 0; $y < 5; $y++) {
  $array = [$y];
  for($x = $x < 5; $x++) {
    $array[$y][$x] = $count;
    $count++;
  }
}
```

So you specify a point by keys and choice a radius to get. Lets to get the point 
["x" => 3, "y" => 2], and a 3 elements radius.

|    |    |       |    |    |
|----|----|-------|----|----|
| 1  | 2  | 3     | 4  | 5  |
| 6  | 7  | **8** | 9  | 10 |
| 11 | 12 | 13    | 14 | 15 |
| 16 | 17 | 18    | 19 | 20 |
| 21 | 22 | 23    | 24 | 25 |

```php
$circlefetch = new ArrayCircleFetch($array);
$result = $circlefetch->get(["x" => 3, "y"=> 2], 3);
```

Will get:

|       |        |        |        |        |
|-------|--------|--------|--------|--------|
| 1     | **2**  | **3**  | **4**  | 5      |
| **6** | **7**  | **8**  | **9**  | **10** |
| 11    | **12** | **13** | **14** | 15     |
| 16    | 17     | **18** | 19     | 20     |
| 21    | 22     | 23     | 24     | 25     |

In a one dimension array:

[2,3,4,6,7,8,9,10,12,13,14,18].

## TODO

 * build a small square in 2*radious size to get more performance.