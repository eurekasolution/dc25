<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>n-gram 네트워크 시각화</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }

        svg {
            width: 100%;
            height: 100vh;
            display: block;
        }

        .link {
            stroke: #999;
            stroke-opacity: 0.6;
        }

        .node text {
            font: 12px sans-serif;
            text-anchor: middle;
            fill: #000;
            pointer-events: none;
        }

        .tooltip {
            position: absolute;
            background-color: yellow;
            color: black;
            padding: 5px;
            border: 1px solid #999;
            border-radius: 4px;
            pointer-events: none;
            font-size: 13px;
            visibility: hidden;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<svg></svg>
<div class="tooltip" id="tooltip"></div>

<?php
// ngram.json 파일 로드
$json = file_get_contents("ngram.json");
?>

<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
    const graph = <?php echo $json; ?>;

    const svg = d3.select("svg");
    const width = window.innerWidth;
    const height = window.innerHeight;

    const container = svg.append("g");

    // 줌 & 이동 기능
    svg.call(d3.zoom()
        .scaleExtent([0.3, 4])
        .on("zoom", (event) => {
            container.attr("transform", event.transform);
        })
    );

    // 색상 스케일 정의
    const colorScale = d3.scaleLinear()
        .domain([1, 100])
        .range(["#FFFFFF", "#FF0000"]);

    // 링크 굵기 스케일 정의
    const linkScale = d3.scaleLinear()
        .domain([1, 100])
        .range([1, 30]);

    const tooltip = d3.select("#tooltip");

    // 링크 그리기
    const link = container.selectAll(".link")
        .data(graph.links)
        .enter().append("line")
        .attr("class", "link")
        .attr("stroke-width", d => d.value > 100 ? 30 : linkScale(d.value))
        .on("mouseover", function(event, d) {
            tooltip
                .style("visibility", "visible")
                .html(`출현: ${d.value}회<br>source: ${d.source.id}<br>target: ${d.target.id}`);
        })
        .on("mousemove", function(event) {
            tooltip
                .style("top", (event.pageY + 10) + "px")
                .style("left", (event.pageX + 10) + "px");
        })
        .on("mouseout", function() {
            tooltip.style("visibility", "hidden");
        });

    // 노드 그룹
    const node = container.selectAll(".node")
        .data(graph.nodes)
        .enter().append("g")
        .attr("class", "node")
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended)
        );

    // 원
    node.append("circle")
        .attr("r", 20)
        .attr("fill", d => d.count > 100 ? "#FF0000" : colorScale(d.count))
        .on("mouseover", function(event, d) {
            tooltip
                .style("visibility", "visible")
                .html(`글자: ${d.id}<br>출현: ${d.count}회`);
        })
        .on("mousemove", function(event) {
            tooltip
                .style("top", (event.pageY + 10) + "px")
                .style("left", (event.pageX + 10) + "px");
        })
        .on("mouseout", function() {
            tooltip.style("visibility", "hidden");
        });

    // 텍스트
    node.append("text")
        .attr("dy", 4)
        .text(d => d.id);

    // 시뮬레이션
    const simulation = d3.forceSimulation(graph.nodes)
        .force("link", d3.forceLink(graph.links).id(d => d.id).distance(120))
        .force("charge", d3.forceManyBody().strength(-300))
        .force("center", d3.forceCenter(width / 2, height / 2));

    simulation.on("tick", () => {
        link
            .attr("x1", d => d.source.x)
            .attr("y1", d => d.source.y)
            .attr("x2", d => d.target.x)
            .attr("y2", d => d.target.y);

        node.attr("transform", d => `translate(${d.x},${d.y})`);
    });

    function dragstarted(event, d) {
        if (!event.active) simulation.alphaTarget(0.3).restart();
        d.fx = d.x;
        d.fy = d.y;
    }

    function dragged(event, d) {
        d.fx = event.x;
        d.fy = event.y;
    }

    function dragended(event, d) {
        if (!event.active) simulation.alphaTarget(0);
        d.fx = null;
        d.fy = null;
    }
</script>
</body>
</html>
