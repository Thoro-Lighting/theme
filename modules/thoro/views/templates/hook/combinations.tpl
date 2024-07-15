{if !empty($attributes)}
	<div class="smart-variants sticky_off">
		{foreach $attributes as $attribute_group}
		<div class="box-smart-variants">
			<label>{$attribute_group.name}</label>
			<p class="{if $attribute_group.type == 'color'}color_box{/if}">
				{if $attribute_group.type == 'select'}
					<select class="form-control form-control-select" onchange="window.location = this.value">
						{foreach $attribute_group.values as $row}
							<option value="{$row.url}"{if $row.selected} selected{/if}>{$row.name}</option>
						{/foreach}
					</select>
				{else}
					{foreach $attribute_group.values as $row}
						<a href="{$row.url}" class="attribute-radio{if $row.selected} selected{/if}{if !empty($row.hide)} hidden{/if}" title="{$attribute_group.name}- {$row.name}">
							{if $attribute_group.id_attribute_group == 3}
								<img src="{$row.image}" width="90" height="90">
							{else}
								{$row.name}
							{/if}
						</a>
					{/foreach}
				{/if}
			</p>
			</div>
		{/foreach}
	</div>


{/if}