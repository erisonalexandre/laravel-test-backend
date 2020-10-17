<template>
    <div>
        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative"
			style="height: 405px;">
			<table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
				<thead>
					<tr class="text-left">
						<template v-for="heading in headings">
							<th
                                class="bg-gray-300 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs"
                                :ref="heading.key"
                                :class="[{ [heading.key]: true }, heading.class]"
                                :key="heading.key"
                                >
                                {{heading.value}}
                            </th>
						</template>
					</tr>
				</thead>
				<tbody>
					<template v-for="(item, indexItem) in list" >
						<tr :key="`item-${indexItem}`">
                            <template v-for="heading in headings">
                                <td class="border-dashed border-t border-gray-200 userId" :key="`item-${indexItem}-${heading.key}`">
                                    <slot :name="heading.key" :data="item">
                                        <span class="text-gray-700 px-6 py-3 flex items-center">
                                            {{item[heading.key]}}
                                        </span>
                                    </slot>
                                </td>
                            </template>
						</tr>
					</template>
				</tbody>
			</table>
		</div>
    </div>
</template>
<script>
export default {
    props: {
        headings: {
            type: Array,
            required: true
        },
        list: {
            type: Array,
            required: true
        }
    }
}
</script>
