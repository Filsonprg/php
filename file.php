<?php
class Graph
{
    private $graph = [];

    public function addEdge($node1, $node2)
    {
        if (!isset($this->graph[$node1])) {
            $this->graph[$node1] = [];
        }
        $this->graph[$node1][] = $node2;
    }

    public function isReachable($start, $end)
    {
        $visited = [];
        return $this->dfs($start, $end, $visited);
    }

    private function dfs($current, $end, &$visited)
    {
        if ($current == $end) {
            return true;
        }

        $visited[$current] = true;

        if (isset($this->graph[$current])) {
            foreach ($this->graph[$current] as $neighbor) {
                if (!isset($visited[$neighbor]) && $this->dfs($neighbor, $end, $visited)) {
                    return true;
                }
            }
        }

        return false;
    }
}

// Příklad použití
$graph = new Graph();
$graph->addEdge(1, 2);
$graph->addEdge(2, 3);
$graph->addEdge(2, 4);
$graph->addEdge(3, 5);
$graph->addEdge(4, 6);

$startNode = 1;
$endNode = 5;

if ($graph->isReachable($startNode, $endNode)) {
    echo "Cesta mezi uzly $startNode a $endNode existuje.";
} else {
    echo "Cesta mezi uzly $startNode a $endNode neexistuje.";
}
?>
