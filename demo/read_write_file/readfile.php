<?php
    function getQuestionList($file)
    {
        $questionList = array();
        $title = array();
        foreach($file as &$row)
        {
            $arrRow = explode("\r", $row);
            foreach($arrRow as &$value)
            {
                $value = iconv('gb2312', 'utf-8', $value);
                $q = explode(",", $value, 3);
                if(count($q) > 2)
                {
                    $q[2] = trim($q[2], "\"");
                }
                $questionList[] = $q;
            }
        }
        if(count($questionList) > 0)
        {
        	$title = array_shift($questionList);
        }

        $ans = array(
        	'title' => $title,
        	'list'  => $questionList,
        	);
        return $ans;
    }

$fileContent = file('./data/testfile.csv'); 

var_dump(getQuestionList(file('./data/testfile.csv')));
exit();

$myfile = fopen('./data/testfile.csv', 'r');

while(!feof($myfile))
{
    //echo fgets($myfile);
    $row = fgets($myfile);
    $arrRow = explode(',', $row);
    foreach($arrRow as &$value)
    {
        $value = iconv('gb2312', 'utf-8', $value);

    }
    var_dump($arrRow);
}

fclose($myfile);




