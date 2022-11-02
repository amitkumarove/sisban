<div class="filter-block">

  <p title="Toggle Filter"  id="filter-block" class="filter-block__toggle">Filter news</p>

  <div class="filter-block__filters" id="filter-block-filters">

      <label for="filter-select">SECTOR</label>
        <ul class="filter-block__filters__category-checks">
          <?php
          foreach ($categories as $category) : ?>
            <li>
              <input id="<?php echo $category->name; ?>" class="styled-checkbox" type="checkbox" name="newsType" value="<?php echo $category->term_id; ?>">
              <label for="<?php echo $category->name; ?>"><?php echo $category->name; ?></label>
            </li>
          <?php endforeach; ?>
        </ul>
      
      <div class="filter-block__filters__year">
        <label for="filter-select">YEAR</label>
        <select aria-label="filter-select" id="news-page-year">
            <option value="" selected>All Years</option>
            <?php
              foreach ($postYears as $year) : ?>
                <option value="<?php echo $year['year']; ?>"><?php echo $year['year']; ?></option>
                  <?php
              endforeach;
              ?>
        </select>
      </div>

      <div class="filter-block__filters__btns">
          <button class="results-button-results">
              <span class="results-button_text"></span>
          </button>
          <button class="results-button-clear">Clear results</button>
      </div>

    </div>
</div>