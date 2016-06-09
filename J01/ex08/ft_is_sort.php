<?php
	function ft_is_sort($tab)
	{
		$count = 0;
		$first = $tab;
		sort($tab);
		foreach($tab as $elem)
		{
			if ($elem != $first[$count])
				return (0);
			$count++;
		}
		return (1);
	}
?>
