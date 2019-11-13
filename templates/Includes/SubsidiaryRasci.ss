<td id="$ID-$Subsidiary" class="team $FirstLast $EvenOdd
    <% if $IsSelected('R', $Subsidiary) %>r<% end_if %>
    <% if $IsSelected('A', $Subsidiary) %>a<% end_if %>
    <% if $IsSelected('S', $Subsidiary) %>s<% end_if %>
    <% if $IsSelected('C', $Subsidiary) %>c<% end_if %>
    <% if $IsSelected('I', $Subsidiary) %>i<% end_if %>">
    <% if $CurrentUser.inGroup('administrators') && not $Comparison %>
        <select name="rasci-value[]" title="$Title" class="rasci-value">
            $SubsidiaryID
            <option value=""></option>
            <option value="R-$ID-$Subsidiary" <% if $IsSelected('R', $Subsidiary) %>selected="selected"<% end_if %>>
                R
            </option>
            <option value="A-$ID-$Subsidiary" <% if $IsSelected('A', $Subsidiary) %>selected="selected"<% end_if %>>
                A
            </option>
            <option value="S-$ID-$Subsidiary" <% if $IsSelected('S', $Subsidiary) %>selected="selected"<% end_if %>>
                S
            </option>
            <option value="C-$ID-$Subsidiary" <% if $IsSelected('C', $Subsidiary) %>selected="selected"<% end_if %>>
                C
            </option>
            <option value="I-$ID-$Subsidiary" <% if $IsSelected('I', $Subsidiary) %>selected="selected"<% end_if %>>
                I
            </option>
        </select>
    <% else %>
        <% if $IsSelected('R', $Subsidiary) %>R<% end_if %>
        <% if $IsSelected('A', $Subsidiary) %>A<% end_if %>
        <% if $IsSelected('S', $Subsidiary) %>S<% end_if %>
        <% if $IsSelected('C', $Subsidiary) %>C<% end_if %>
        <% if $IsSelected('I', $Subsidiary) %>I<% end_if %>
    <% end_if %>
</td>
<% if $Comparison %>
    <% with $Comparison %>
        <td id="$Up.ID-$Subsidiary-$ID" class="comparison $Up.FirstLast $Up.EvenOdd
            <% if $CompareValue($Subsidiary, $Up.ID) == 'R' %>r<% end_if %>
            <% if $CompareValue($Subsidiary, $Up.ID) == 'A' %>a<% end_if %>
            <% if $CompareValue($Subsidiary, $Up.ID) == 'S' %>s<% end_if %>
            <% if $CompareValue($Subsidiary, $Up.ID) == 'C' %>c<% end_if %>
            <% if $CompareValue($Subsidiary, $Up.ID) == 'I' %>i<% end_if %>">
            <i>$CompareValue($Subsidiary, $Up.ID)</i>
            <% if $Up.IsSelected('R', $Subsidiary) && $CompareValue($Subsidiary, $Up.ID) != 'R' && $CompareValue($Subsidiary, $Up.ID) %><b>(!)</b><% end_if %>
            <% if $Up.IsSelected('A', $Subsidiary) && $CompareValue($Subsidiary, $Up.ID) != 'A' && $CompareValue($Subsidiary, $Up.ID) %><b>(!)</b><% end_if %>
            <% if $Up.IsSelected('S', $Subsidiary) && $CompareValue($Subsidiary, $Up.ID) != 'S' && $CompareValue($Subsidiary, $Up.ID) %><b>(!)</b><% end_if %>
            <% if $Up.IsSelected('C', $Subsidiary) && $CompareValue($Subsidiary, $Up.ID) != 'C' && $CompareValue($Subsidiary, $Up.ID) %><b>(!)</b><% end_if %>
            <% if $Up.IsSelected('I', $Subsidiary) && $CompareValue($Subsidiary, $Up.ID) != 'I' && $CompareValue($Subsidiary, $Up.ID) %><b>(!)</b><% end_if %>
        </td>
    <% end_with %>
<% end_if %>
