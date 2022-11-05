<div class="section-header">
    <img src="/assets/section-icons/ft-yes-or-no.png" alt="Fast Talk: Yes or No" class="section-header-icon"/ >
    <h1 class="section-header-text">Fast Talk: Yes or No</h1>
</div>

<div class="section-body">
    <!-- Fetch Data -->
    <?php
    // Convert JSON to associative array (true parameter)
    $candidates_list_data = json_decode(file_get_contents('./json/candidates-per-position.json'), true);
    ?>

    <!-- Display Candidates -->
    <div class="row row-cols-1 row-cols-md-2 g-0 px-4 px-md-0">
        <!-- Column 1: OPRES to RVRCOB CP -->
        <div class="col">

            <!-- OPRES -->
            <span class="position-label"><?php echo $candidates_list_data[0]["position"]; ?></span>
            <div class="row g-2 mb-3">
                
                <?php foreach ($candidates_list_data[0]["candidates"] as $cand): ?>
                    <div class="col">
                        <?php render_cand_info($cand); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $pos_index = 1; ?>

            <!-- OVPEA to RVRCOB -->
            <?php for ($row = 0; $row < 3; $row++): ?>
                <div class="row row-cols-2 g-2 mb-3">
                    <?php for ($col = 0; $col < 2; $col++): ?>
                        <div class="col">
                            <span class="position-label"><?php echo $candidates_list_data[$pos_index]["position"]; ?></span>
                            <?php foreach ($candidates_list_data[$pos_index]["candidates"] as $cand): ?>
                                <?php render_cand_info($cand); ?>
                            <?php endforeach; ?>
                            <?php $pos_index++; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>

        </div>
        <!-- Column 2: SOE CP to COS CP -->
        <div class="col">
            <?php for ($row = 0; $row < 3; $row++): ?>
                <div class="row row-cols-2 g-2 mb-3">
                    <?php for ($col = 0; $col < 2; $col++): ?>
                        <div class="col">
                            <!-- <span class="position-label"><?php echo $candidates_list_data[$pos_index]["position"]; ?></span> -->
                            <?php if ($pos_index < 12) : ?>
                                <span class="position-label"><?php echo $candidates_list_data[$pos_index]["position"]; ?></span>
                                <?php foreach ($candidates_list_data[$pos_index]["candidates"] as $cand): ?>
                                    <?php render_cand_info($cand); ?>
                                <?php endforeach; ?>
                                <?php $pos_index++; ?>
                            <?php endif; ?>
                        
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        </div>
        
    </div>

    <?php
    function render_cand_info($cand) {
        echo <<<INFO
            <div class="ft-cand-info d-flex align-items-center">
                <img class="ft-cand-portrait me-2" src="" alt=""  />
                <p>
                    <span class="ft-cand-name">{$cand["surname"]}</span><br/>
                    <span class="ft-cand-party">{$cand["party"]}</span>
                </p>
            </div>
        INFO;
    }
    ?>
</div>